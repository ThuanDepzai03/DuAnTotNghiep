<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'user.required' => 'Vui lòng nhập tài khoản admin.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        $loginValue = trim($request->user);

        $admin = DB::table('admins')
            ->where(function ($query) use ($loginValue) {
                $query->where('name', $loginValue)
                    ->orWhere('email', $loginValue);
            })
            ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tài khoản admin hoặc mật khẩu không đúng.'
                ], 422);
            }

            return back()->withErrors(['user' => 'Tài khoản admin hoặc mật khẩu không đúng.'])->withInput();
        }

        $request->session()->regenerate();
        session(['admin' => [
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email,
            'role' => 'admin',
        ]]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => route('admin.dashboard'),
                'message' => 'Đăng nhập admin thành công.'
            ]);
        }

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        session()->forget('admin');
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
