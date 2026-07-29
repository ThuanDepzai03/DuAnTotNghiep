<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('nguoidung')
            ->orderByDesc('id')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user' => [
                'required',
                'string',
                'max:255',
                'unique:nguoidung,user',
            ],
            'pass' => [
                'required',
                'string',
                'min:4',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:nguoidung,email',
            ],
            'address' => [
                'nullable',
                'string',
                'max:500',
            ],
            'tel' => [
                'nullable',
                'string',
                'max:20',
            ],
            'role' => [
                'required',
                'in:0,1',
            ],
        ], [
            'user.required' => 'Vui lòng nhập tên đăng nhập.',
            'user.unique' => 'Tên đăng nhập đã tồn tại.',
            'pass.required' => 'Vui lòng nhập mật khẩu.',
            'pass.min' => 'Mật khẩu phải có ít nhất 4 ký tự.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng.',
        ]);

        DB::table('nguoidung')->insert([
            'user' => trim($data['user']),
            'pass' => $data['pass'],
            'email' => trim($data['email']),
            'address' => $data['address'] ?? null,
            'tel' => $data['tel'] ?? null,
            'role' => (int) $data['role'],
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Thêm tài khoản thành công.');
    }

    public function edit($id)
    {
        $user = DB::table('nguoidung')
            ->where('id', $id)
            ->first();

        abort_if(!$user, 404, 'Tài khoản không tồn tại.');

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user' => [
                'required',
                'string',
                'max:255',
                Rule::unique('nguoidung', 'user')->ignore($id),
            ],
            'pass' => [
                'nullable',
                'string',
                'min:4',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('nguoidung', 'email')->ignore($id),
            ],
            'address' => [
                'nullable',
                'string',
                'max:500',
            ],
            'tel' => [
                'nullable',
                'string',
                'max:20',
            ],
            'role' => [
                'required',
                'in:0,1',
            ],
        ], [
            'user.required' => 'Vui lòng nhập tên đăng nhập.',
            'user.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng.',
        ]);

        $updateData = [
            'user' => trim($data['user']),
            'email' => trim($data['email']),
            'address' => $data['address'] ?? null,
            'tel' => $data['tel'] ?? null,
            'role' => (int) $data['role'],
        ];

        // Không nhập mật khẩu mới thì giữ nguyên mật khẩu cũ.
        if (!empty($data['pass'])) {
            $updateData['pass'] = $data['pass'];
        }

        DB::table('nguoidung')
            ->where('id', $id)
            ->update($updateData);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Cập nhật tài khoản thành công.');
    }

    public function destroy($id)
    {
        DB::table('nguoidung')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Đã xóa tài khoản.');
    }
}
