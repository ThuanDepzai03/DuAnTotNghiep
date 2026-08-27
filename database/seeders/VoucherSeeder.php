<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vouchers')->insert([
            [
                'code' => 'GIAM10',
                'name' => 'Giảm 10%',
                'voucher_type' => 'flash_sale',
                'discount_type' => 'percent',
                'discount_value' => 10,
                'max_discount' => 100000,
                'min_order' => 0,
                'quantity' => 100,
                'used_quantity' => 0,
                'start_date' => '2026-08-01',
                'end_date' => '2026-12-31',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FREESHIP',
                'name' => 'Free Ship',
                'voucher_type' => 'flash_sale',
                'discount_type' => 'free_shipping',
                'discount_value' => 0,
                'max_discount' => 0,
                'min_order' => 0,
                'quantity' => 100,
                'used_quantity' => 0,
                'start_date' => '2026-08-01',
                'end_date' => '2026-12-31',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}