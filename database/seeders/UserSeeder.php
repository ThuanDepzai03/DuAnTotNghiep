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
            ['email' => 'admin'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('123123123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Tạo hoặc cập nhật tài khoản User
        DB::table('nguoidung')->updateOrInsert(
            ['user' => 'user'],
            [
                'email' => 'user',
                'pass' => Hash::make('123123123'),
                'role' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}