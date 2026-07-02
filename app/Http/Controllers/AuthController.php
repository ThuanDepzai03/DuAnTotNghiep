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

        $user = DB::table('nguoidung')
            ->where('user', $request->user)
            ->first();

        if ($user && $user->pass === $request->pass) {
            session(['customer' => [
                'id' => $user->id,
                'user' => $user->user,
                'email' => $user->email,
                'address' => $user->address,
                'tel' => $user->tel,
                'role' => (int) $user->role,
            ]]);

            if ((int) $user->role === 1) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('account.profile');
        }

        return back()->withErrors(['user' => 'Tên đăng nhập hoặc mật khẩu không đúng.']);
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

        $orders = DB::table('hoadon')
            ->where('tenkhachhang', $user->user)
            ->orWhere('sdt', $user->tel)
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
}
