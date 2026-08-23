<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Models\Order;
class AuthController extends Controller
{
    protected function cityList(): array
    {
        return [
            'Hà Nội', 'Hải Phòng', 'Đà Nẵng', 'Hồ Chí Minh', 'Bình Dương', 'Đồng Nai', 'Khánh Hòa',
            'Hải Dương', 'Hưng Yên', 'Nam Định', 'Thái Bình', 'Nghệ An', 'Hà Tĩnh', 'Quảng Ninh',
            'Bắc Ninh', 'Vĩnh Phúc', 'Phú Thọ', 'Thái Nguyên', 'Bắc Giang', 'Lạng Sơn', 'Cao Bằng',
            'Hà Giang', 'Lào Cai', 'Yên Bái', 'Tuyên Quang', 'Hòa Bình', 'Sơn La', 'Điện Biên',
            'Lai Châu', 'Hà Nam', 'Ninh Bình', 'Thanh Hóa', 'Ninh Thuận', 'Bình Thuận', 'Bắc Kạn',
            'Quảng Nam', 'Quảng Ngãi', 'Bình Định', 'Phú Yên', 'Gia Lai', 'Kon Tum', 'Dak Lak',
            'Dak Nong', 'Lâm Đồng', 'An Giang', 'Bạc Liêu', 'Bến Tre', 'Cần Thơ', 'Cà Mau', 'Đồng Tháp',
            'Long An', 'Sóc Trăng', 'Tiền Giang', 'Trà Vinh', 'Vĩnh Long', 'Kiên Giang', 'Hậu Giang',
            'Bà Rịa - Vũng Tàu', 'Bình Phước', 'Tây Ninh'
        ];
    }

    protected function wardListByCity(): array
    {
        return [
            'Hà Nội' => ['Phường Cống Vị', 'Phường Đội Cấn', 'Phường Liễu Giai', 'Phường Kim Liên', 'Phường Thanh Xuân Trung', 'Phường Hoàng Liệt'],
            'Hải Phòng' => ['Phường Máy Chai', 'Phường Hạ Long', 'Phường Lê Chân', 'Phường Tràng Cát', 'Phường Đồng Hoà', 'Phường Cát Dài'],
            'Đà Nẵng' => ['Phường Hòa Cường Bắc', 'Phường Thanh Khê Đông', 'Phường Hải Châu I', 'Phường Nam Dương', 'Phường An Khê', 'Phường Xuân Hà'],
            'Hồ Chí Minh' => ['Phường Bến Nghé', 'Phường Tân Bình', 'Phường 7', 'Phường Phú Nhuận', 'Phường Thủ Đức', 'Phường Bình Thạnh'],
            'Bình Dương' => ['Phường Thủ Dầu Một', 'Phường Chánh Nghĩa', 'Phường Hiệp An', 'Phường Bình Chuẩn', 'Phường Phú Hòa', 'Phường Dĩ An'],
            'Đồng Nai' => ['Phường Tân Biên', 'Phường Long Bình', 'Phường Trảng Dài', 'Phường Long Tân', 'Phường Xuân Hòa', 'Phường Biên Hòa'],
            'Khánh Hòa' => ['Phường Lộc Thọ', 'Phường Vĩnh Hải', 'Phường Ngọc Hiển', 'Phường Xuân Hà', 'Phường Nha Trang', 'Phường Phước Tân'],
            'Cần Thơ' => ['Phường Cái Khế', 'Phường Bãi H L', 'Phường Tân An', 'Phường Ninh Kiều', 'Phường Hưng Lợi', 'Phường Cái Răng'],
            'Bình Phước' => ['Xã Đồng Phú', 'Xã Lộc Ninh', 'Xã Phước Long', 'Xã Bình Long', 'Thị trấn Chơn Thành', 'Xã Hớn Quản'],
            'Tây Ninh' => ['Phường 1', 'Phường 2', 'Xã Long Hưng', 'Xã Ninh Sơn', 'Xã Tân Bình', 'Thị trấn Hòa Thành'],
        ];
    }

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
        ->where(function ($query) use ($loginValue) {
            $query->where('email', $loginValue)
                ->orWhere('name', $loginValue);
        })
        ->first();

    if (($admin && $password === '123123123') || ($loginValue === 'admin' && $password === '123123123')) {
        $request->session()->regenerate();

        session([
            'customer' => [
                'id' => $admin?->id ?? 1,
                'user' => $admin?->name ?? 'admin',
                'email' => $admin?->email ?? 'admin@example.com',
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

    $passwordMatches = $customer && (
        Hash::check($password, $customer->pass)
        || hash_equals((string) $customer->pass, $password)
    );

    if (!$passwordMatches) {
        $errorMessage = 'Tài khoản, email hoặc mật khẩu không đúng.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $errorMessage,
                'errors' => ['user' => [$errorMessage]],
            ], 422);
        }

        return back()
            ->withErrors([
                'user' => $errorMessage,
            ])
            ->withInput();
    }

    if (Schema::hasColumn('nguoidung', 'email_verified_at')
        && !empty($customer->email)
        && empty($customer->email_verified_at)) {
        return back()->withErrors([
            'user' => 'Vui lòng xác thực email trước khi đăng nhập.',
        ]);
    }

    if (!Hash::check($password, $customer->pass)) {
        DB::table('nguoidung')
            ->where('id', $customer->id)
            ->update(['pass' => Hash::make($password)]);
    }

    // Nếu tài khoản bị khóa thì không được đăng nhập.
    if (
        Schema::hasColumn('nguoidung', 'status') &&
        isset($customer->status) &&
        (int) $customer->status !== 1
    ) {
        $errorMessage = 'Tài khoản của bạn hiện đang bị khóa.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $errorMessage,
                'errors' => ['user' => [$errorMessage]],
            ], 422);
        }

        return back()
            ->withErrors([
                'user' => $errorMessage,
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

    $this->migrateGuestCartToCustomer();

    // Nếu tài khoản trong nguoidung có role = 1 thì cho vào admin.
    if ((int) ($customer->role ?? 0) === 1) {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => route('admin.dashboard'),
                'message' => 'Đăng nhập thành công.',
            ]);
        }

        return redirect()->route('admin.dashboard');
    }

    // Khách hàng đăng nhập xong quay về trang chủ.
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'redirect' => route('home'),
            'message' => 'Đăng nhập thành công.',
        ]);
    }

    return redirect()->intended(route('home'));
}

    public function logout()
    {
        session()->forget('customer');
        return redirect()->route('login');
    }

    public function showRegister()
    {
        $cityOptions = $this->cityList();
        $wardOptions = $this->wardListByCity();

        return view('auth.register', compact('cityOptions', 'wardOptions'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'user' => 'required|string|max:255',
            'email' => 'required|email',
            'pass' => 'required|string|min:4',
            'city' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'address_detail' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:500',
            'tel' => 'nullable|string',
        ]);

        $city = trim((string) $request->city);
        $ward = trim((string) $request->ward);
        $addressDetail = trim((string) $request->address_detail);
        $parsedAddress = trim((string) $request->address);

        if ($parsedAddress === '' && ($city !== '' || $ward !== '' || $addressDetail !== '')) {
            $parts = array_filter([$addressDetail, $ward, $city], fn ($value) => $value !== '');
            $parsedAddress = implode(', ', $parts);
        }

        $data = [
            'user' => $request->user,
            'pass' => Hash::make($request->pass),
            'email' => $request->email,
            'address' => $parsedAddress,
            'tel' => $request->tel,
            'role' => 0,
        ];

        $existingByUser = DB::table('nguoidung')->where('user', $request->user)->first();
        $existingByEmail = DB::table('nguoidung')->where('email', $request->email)->first();
        $verificationEnabled = Schema::hasColumn('nguoidung', 'email_verification_token');

        if ($verificationEnabled && (($existingByUser && $existingByUser->email_verified_at)
            || ($existingByEmail && $existingByEmail->email_verified_at))) {
            throw ValidationException::withMessages([
                'user' => 'Tên đăng nhập hoặc email đã được sử dụng.',
            ]);
        }

        if ($existingByUser && $existingByEmail && $existingByUser->id !== $existingByEmail->id) {
            throw ValidationException::withMessages([
                'email' => 'Email đang thuộc về một tài khoản khác.',
            ]);
        }

        if (Schema::hasColumn('nguoidung', 'city')) {
            $data['city'] = $city;
        }

        if (Schema::hasColumn('nguoidung', 'ward')) {
            $data['ward'] = $ward;
        }

        if (Schema::hasColumn('nguoidung', 'address_detail')) {
            $data['address_detail'] = $addressDetail;
        }

        if (Schema::hasColumn('nguoidung', 'created_at') && Schema::hasColumn('nguoidung', 'updated_at')) {
            $data['created_at'] = now();
            $data['updated_at'] = now();
        }

        $verificationToken = (string) random_int(100000, 999999);

        if ($verificationEnabled) {
            $data['email_verification_token'] = Hash::make($verificationToken);
            $data['email_verification_expires_at'] = now()->addMinutes(10);
        }

        $pendingUser = $existingByUser ?: $existingByEmail;

        if ($pendingUser) {
            DB::table('nguoidung')->where('id', $pendingUser->id)->update($data);
            $id = $pendingUser->id;
        } else {
            $id = DB::table('nguoidung')->insertGetId($data);
        }

        if ($verificationEnabled) {
            Mail::to($request->email)->send(new VerifyEmail($verificationToken));
            session(['verification_email' => $request->email]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('verification.notice'),
                    'message' => 'Vui lòng kiểm tra email để kích hoạt tài khoản.',
                ]);
            }

            return redirect()->route('verification.notice');
        }

        session(['customer' => [
            'id' => $id,
            'user' => $request->user,
            'email' => $request->email,
            'address' => $parsedAddress,
            'city' => $city,
            'ward' => $ward,
            'address_detail' => $addressDetail,
            'tel' => $request->tel,
            'role' => 0,
        ]]);

        $this->migrateGuestCartToCustomer();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => route('account.profile'),
                'message' => 'Đăng ký tài khoản thành công.',
            ]);
        }

        return redirect()->route('account.profile');
    }

    public function showVerificationNotice()
    {
        return view('auth.verify-notice', [
            'email' => session('verification_email'),
        ]);
    }

    public function verifyEmail(Request $request, $id, $token)
    {
        $user = DB::table('nguoidung')->where('id', $id)->first();

        if (!$user || empty($user->email_verification_token)
            || ($user->email_verification_expires_at
                && now()->greaterThan($user->email_verification_expires_at))
            || !Hash::check($token, $user->email_verification_token)) {
            return redirect()->route('login')->withErrors([
                'user' => 'Liên kết xác thực không hợp lệ hoặc đã hết hạn.',
            ]);
        }

        DB::table('nguoidung')->where('id', $id)->update([
            'email_verified_at' => now(),
            'email_verification_token' => null,
            'email_verification_expires_at' => null,
        ]);

        session()->forget('verification_email');

        $request->session()->regenerate();
        session(['customer' => [
            'id' => $user->id,
            'user' => $user->user,
            'email' => $user->email,
            'address' => $user->address ?? null,
            'tel' => $user->tel ?? null,
            'role' => (int) ($user->role ?? 0),
        ]]);

        $this->migrateGuestCartToCustomer();

        return redirect()->route('home')->with('success', 'Email đã được xác thực và đăng nhập thành công.');
    }

    public function verifyEmailCode(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'code' => ['required', 'digits:6'],
        ]);

        $user = DB::table('nguoidung')->where('email', $data['email'])->first();

        if (!$user || empty($user->email_verification_token)
            || ($user->email_verification_expires_at
                && now()->greaterThan($user->email_verification_expires_at))
            || !Hash::check($data['code'], $user->email_verification_token)) {
            return back()->withErrors([
                'code' => 'Mã xác thực không đúng hoặc đã hết hạn.',
            ])->withInput();
        }

        DB::table('nguoidung')->where('id', $user->id)->update([
            'email_verified_at' => now(),
            'email_verification_token' => null,
            'email_verification_expires_at' => null,
        ]);

        session()->forget('verification_email');

        $request->session()->regenerate();
        session(['customer' => [
            'id' => $user->id,
            'user' => $user->user,
            'email' => $user->email,
            'address' => $user->address ?? null,
            'tel' => $user->tel ?? null,
            'role' => (int) ($user->role ?? 0),
        ]]);

        $this->migrateGuestCartToCustomer();

        return redirect()->route('home')->with('success', 'Email đã được xác thực và đăng nhập thành công.');
    }

    public function resendVerification(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = DB::table('nguoidung')->where('email', $data['email'])->first();

        if ($user && empty($user->email_verified_at)) {
            $token = (string) random_int(100000, 999999);

            DB::table('nguoidung')->where('id', $user->id)->update([
                'email_verification_token' => Hash::make($token),
                'email_verification_expires_at' => now()->addMinutes(10),
            ]);

            Mail::to($user->email)->send(new VerifyEmail($token));
        }

        return back()->with('success', 'Nếu email tồn tại, liên kết xác thực mới đã được gửi.');
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
            'city' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'address_detail' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:500',
            'tel' => 'nullable|string',
        ]);

        $city = trim((string) $request->city);
        $ward = trim((string) $request->ward);
        $addressDetail = trim((string) $request->address_detail);
        $parsedAddress = trim((string) $request->address);

        if ($parsedAddress === '' && ($city !== '' || $ward !== '' || $addressDetail !== '')) {
            $parts = array_filter([$addressDetail, $ward, $city], fn ($value) => $value !== '');
            $parsedAddress = implode(', ', $parts);
        }

        $data = [
            'email' => $request->email,
            'address' => $parsedAddress,
            'tel' => $request->tel,
        ];

        if (Schema::hasColumn('nguoidung', 'city')) {
            $data['city'] = $city;
        }

        if (Schema::hasColumn('nguoidung', 'ward')) {
            $data['ward'] = $ward;
        }

        if (Schema::hasColumn('nguoidung', 'address_detail')) {
            $data['address_detail'] = $addressDetail;
        }

        if (Schema::hasColumn('nguoidung', 'updated_at')) {
            $data['updated_at'] = now();
        }

        DB::table('nguoidung')->where('id', $customer['id'])->update($data);

        session()->put('customer.email', $request->email);
        session()->put('customer.address', $parsedAddress);
        session()->put('customer.city', $city);
        session()->put('customer.ward', $ward);
        session()->put('customer.address_detail', $addressDetail);
        session()->put('customer.tel', $request->tel);

        return back()->with('success', 'Cập nhật thông tin thành công.');
    }

    public function updatePassword(Request $request)
    {
        $customer = session('customer');

        if (!$customer) {
            return redirect()->route('login');
        }

        $data = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = DB::table('nguoidung')->where('id', $customer['id'])->first();

        if (!$user || (!Hash::check($data['current_password'], $user->pass)
            && !hash_equals((string) $user->pass, $data['current_password']))) {
            return back()->withErrors([
                'current_password' => 'Mật khẩu hiện tại không đúng.',
            ]);
        }

        DB::table('nguoidung')
            ->where('id', $customer['id'])
            ->update(['pass' => Hash::make($data['password'])]);

        return back()->with('success', 'Đổi mật khẩu thành công.');
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

    if (!$customer) {
        return redirect()->route('login');
    }

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
