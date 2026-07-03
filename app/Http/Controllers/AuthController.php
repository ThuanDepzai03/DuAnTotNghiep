<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'user' => 'required|string',
        'pass' => 'required|string',
    ]);

    $admin = DB::table('admins')
        ->where('email', $request->user)
        ->first();

    if ($admin && $request->pass === '123456')  {
    session(['customer' => [
        'id' => $admin->id,
        'user' => $admin->name,
        'email' => $admin->email,
        'role' => 1,
    ]]);

    return redirect()->route('admin.dashboard');
}

    return back()->withErrors([
        'user' => 'Email hoặc mật khẩu không đúng.'
    ]);
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

        return view('account.profile', compact('user'));
    }

    public function orders()
    {
        $customer = session('customer');
        if (!$customer) return redirect()->route('login');

        $user = DB::table('nguoidung')->where('id', $customer['id'])->first();

        $orders = DB::table('hoadon')
            ->join('chitiethoadon', 'hoadon.id', '=', 'chitiethoadon.hoadon_id')
            ->join('bien_the_san_pham', 'chitiethoadon.product_variant_id', '=', 'bien_the_san_pham.id')
            ->select(
                'hoadon.*', 
                'bien_the_san_pham.hinh_anh as product_image'
            )
            ->where('hoadon.tenkhachhang', $user->user)
            ->orWhere('hoadon.sdt', $user->tel)
            ->orderByDesc('hoadon.id')
            ->get()
            ->unique('id'); // Lấy mỗi đơn hàng 1 lần, ảnh sẽ là của sản phẩm đầu tiên

        return view('account.orders', compact('orders'));
    }

    public function orderDetail($id)
    {
        $customer = session('customer');
        if (!$customer) return redirect()->route('login');

        $order = DB::table('hoadon')->where('id', $id)->first();
        if (!$order) abort(404);

        $items = DB::table('chitiethoadon')
            ->join('bien_the_san_pham', 'chitiethoadon.product_variant_id', '=', 'bien_the_san_pham.id')
            ->where('hoadon_id', $id)
            ->select('chitiethoadon.*', 'bien_the_san_pham.hinh_anh')
            ->get();

        return view('account.order-detail', compact('order', 'items'));
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
    
    
}


