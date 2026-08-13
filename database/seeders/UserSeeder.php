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
            ['email' => 'admin'], // Điều kiện kiểm tra (tài khoản đăng nhập)  
            [
                'name' => 'Administrator',
                'password' => Hash::make('123123123'), // Mật khẩu đã mã hóa  
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Tạo hoặc cập nhật tài khoản User (giả sử bảng là nguoidung)
        DB::table('nguoidung')->updateOrInsert(
            ['email' => 'user'], // Điều kiện kiểm tra
            [
                'password' => Hash::make('123123123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}