<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo hoặc cập nhật tài khoản Admin
        DB::table('admins')->updateOrInsert(
            ['email' => 'admin@gmail.com'], // Điều kiện kiểm tra (tài khoản đăng nhập)  
            [
                'name' => 'admin', // Tên hiển thị của admin
                'password' => Hash::make('123123123'), // Mật khẩu đã mã hóa  
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Tạo hoặc cập nhật tài khoản User (bảng nguoidung dùng cột pass, không phải password)
        DB::table('nguoidung')->updateOrInsert(
            ['email' => 'user@gmail.com'],
            [
                'user' => 'customer',
                'email' => 'user@gmail.com',
                'pass' => Hash::make('123123123'),
                'role' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}