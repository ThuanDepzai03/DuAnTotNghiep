<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [            array (
      'name' => 'Khách hàng mẫu',
  'user' => 'customer',
  'pass' => '$2y$12$mJCTLFIWrD6BuZhIcxS6M.Q0fFvsTzV0DjWTu2OMoYUSnSCiOWWKa',
  'email' => 'user@gmail.com',
  'address' => NULL,
  'tel' => NULL,
  'role' => 0,
),
        ];

        foreach ($users as $user) {
            DB::table('nguoidung')->updateOrInsert(
                ['email' => $user['email']],
                $user
            );
        }
    }
}