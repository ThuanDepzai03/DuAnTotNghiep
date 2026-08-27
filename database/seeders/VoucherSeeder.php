<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        $vouchers = [
            [
                'code' => 'FLASH20',
                'name' => 'Flash Sale giảm 20%',
                'voucher_type' => 'flash_sale',
                'discount_type' => 'percent',
                'discount_value' => 20,
                'max_discount' => 200000,
                'min_order' => 0,
                'quantity' => 100,
                'start_date' => '2026-08-27',
                'end_date' => '2026-08-31',
            ],
            [
                'code' => 'TRUNGTU2026',
                'name' => 'Sự kiện Trung Thu 2026',
                'voucher_type' => 'mid_autumn',
                'discount_type' => 'percent',
                'discount_value' => 15,
                'max_discount' => 150000,
                'min_order' => 0,
                'quantity' => 500,
                'start_date' => '2026-08-27',
                'end_date' => '2026-09-25',
            ],
            [
                'code' => 'FREESHIP2026',
                'name' => 'Miễn phí vận chuyển',
                'voucher_type' => 'normal',
                'discount_type' => 'free_shipping',
                'discount_value' => 0,
                'max_discount' => 0,
                'min_order' => 0,
                'quantity' => 300,
                'start_date' => '2026-08-27',
                'end_date' => '2026-12-31',
            ],
        ];

        for ($number = 1; $number <= 10; $number++) {
            $vouchers[] = [
                'code' => 'SP' . str_pad((string) $number, 2, '0', STR_PAD_LEFT),
                'name' => 'Voucher sản phẩm ' . $number,
                'voucher_type' => 'normal',
                'discount_type' => 'percent',
                'discount_value' => $number <= 5 ? 10 : 15,
                'max_discount' => $number <= 5 ? 100000 : 150000,
                'min_order' => 0,
                'quantity' => 100,
                'start_date' => '2026-08-27',
                'end_date' => '2026-12-31',
            ];
        }

        foreach ($vouchers as $voucher) {
            DB::table('vouchers')->updateOrInsert(
                ['code' => $voucher['code']],
                array_merge($voucher, [
                    'used_quantity' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}