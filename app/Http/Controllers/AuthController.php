<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Order;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $data = $request->validate([
        'user' => 'required|string',
        'pass' => 'required|string',
    ], [
        'user.required' => 'Vui lòng nhập tài khoản hoặc email.',
        'pass.required' => 'Vui lòng nhập mật khẩu.',
    ]);

    $loginValue = trim($data['user']);
    $password = $data['pass'];

    /*
    |--------------------------------------------------------------------------
    | 1. Đăng nhập Admin
    |--------------------------------------------------------------------------
    | Giữ nguyên cách admin hiện tại của dự án:
    | Email admin + mật khẩu 123456
    */
    $admin = DB::table('admins')
        ->where('email', $loginValue)
        ->first();

    if ($admin && $password === '123456') {
        $request->session()->regenerate();

        session([
            'customer' => [
                'id' => $admin->id,
                'user' => $admin->name,
                'email' => $admin->email,
                'role' => 1,
            ],
        ]);

        return redirect()->route('admin.dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | 2. Đăng nhập Khách hàng
    |--------------------------------------------------------------------------
    | Có thể dùng tên đăng nhập hoặc email.
    */
    $customerQuery = DB::table('nguoidung')
        ->where('user', $loginValue);

    if (Schema::hasColumn('nguoidung', 'email')) {
        $customerQuery->orWhere('email', $loginValue);
    }

    $customer = $customerQuery->first();

    if (!$customer || $password !== $customer->pass) {
    return back()
        ->withErrors([
            'user' => 'Tài khoản, email hoặc mật khẩu không đúng.',
        ])
        ->withInput();
}

    // Nếu tài khoản bị khóa thì không được đăng nhập.
    if (
        Schema::hasColumn('nguoidung', 'status') &&
        isset($customer->status) &&
        (int) $customer->status !== 1
    ) {
        return back()
            ->withErrors([
                'user' => 'Tài khoản của bạn hiện đang bị khóa.',
            ])
            ->withInput();
    }

    $request->session()->regenerate();

    session([
        'customer' => [
            'id' => $customer->id,
            'user' => $customer->user,
            'email' => $customer->email ?? null,
            'address' => $customer->address ?? null,
            'tel' => $customer->tel ?? null,
            'role' => (int) ($customer->role ?? 0),
        ],
    ]);

    // Nếu tài khoản trong nguoidung có role = 1 thì cho vào admin.
    if ((int) ($customer->role ?? 0) === 1) {
        return redirect()->route('admin.dashboard');
    }

    // Khách hàng đăng nhập xong quay về trang chủ.
    return redirect()->intended(route('home'));
}

    public function logout()
    {
        session()->forget('customer');
        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'user' => 'required|string|max:255|unique:nguoidung,user',
            'email' => 'nullable|email',
            'pass' => 'required|string|min:4',
            'address' => 'nullable|string',
            'tel' => 'nullable|string',
        ]);

        $data = [
            'user' => $request->user,
            'pass' => $request->pass,
            'email' => $request->email,
            'address' => $request->address,
            'tel' => $request->tel,
            'role' => 0,
        ];

        if (Schema::hasColumn('nguoidung', 'created_at') && Schema::hasColumn('nguoidung', 'updated_at')) {
            $data['created_at'] = now();
            $data['updated_at'] = now();
        }

        $id = DB::table('nguoidung')->insertGetId($data);

        session(['customer' => [
            'id' => $id,
            'user' => $request->user,
            'email' => $request->email,
            'address' => $request->address,
            'tel' => $request->tel,
            'role' => 0,
        ]]);

        return redirect()->route('account.profile');
    }

    public function profile()
    {
        $customer = session('customer');

        if (!$customer) {
            return redirect()->route('login');
        }

        $user = DB::table('nguoidung')->where('id', $customer['id'])->first();

        if (!$user) {
            $user = (object) [
                'id' => $customer['id'],
                'user' => $customer['user'] ?? 'Khách hàng',
                'email' => $customer['email'] ?? null,
                'address' => $customer['address'] ?? null,
                'tel' => $customer['tel'] ?? null,
            ];
        }

        $orders = DB::table('orders')
    ->where('phone', $user->tel)
    ->orWhere('email', $user->email)
    ->orderByDesc('id')
    ->get();

        return view('account.profile', compact('user', 'orders'));
    }

    public function updateProfile(Request $request)
    {
        $customer = session('customer');

        if (!$customer) {
            return redirect()->route('login');
        }

        $request->validate([
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'tel' => 'nullable|string',
        ]);

        $data = [
            'email' => $request->email,
            'address' => $request->address,
            'tel' => $request->tel,
        ];

        if (Schema::hasColumn('nguoidung', 'updated_at')) {
            $data['updated_at'] = now();
        }

        DB::table('nguoidung')->where('id', $customer['id'])->update($data);

        session()->put('customer.email', $request->email);
        session()->put('customer.address', $request->address);
        session()->put('customer.tel', $request->tel);

        return back()->with('success', 'Cập nhật thông tin thành công.');
    }
    public function orderDetail($id)
{
    $customer = session('customer');

    if (!$customer) {

        return redirect()->route('login');

    }

    $order = Order::with('items.variant.product')
    ->findOrFail($id);

$customerPhone = $customer['tel'] ?? null;
$customerEmail = $customer['email'] ?? null;

if (
    $order->phone != $customerPhone
    &&
    $order->email != $customerEmail
) {
    abort(403);
}

    return view(
        'account.order-detail',
        compact('order')
    );
}
public function cancelOrder($id)
{
    $customer = session('customer');

    $order = Order::findOrFail($id);

    if (
        $order->phone != $customer['tel']
        &&
        $order->email != $customer['email']
    ) {

        abort(403);

    }

    if ($order->status != 'pending') {

        return back()
            ->with('error',
                'Đơn hàng đã được xử lý, không thể hủy.');

    }

    $order->update([
        'status'=>'cancelled'
    ]);

    return back()
        ->with('success',
            'Đã hủy đơn hàng thành công.');
}
}
