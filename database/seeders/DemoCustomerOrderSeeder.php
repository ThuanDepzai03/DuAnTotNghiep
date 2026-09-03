<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoCustomerOrderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = fake();
        $faker->seed(20251101);
        $startDate = Carbon::create(2025, 11, 1)->startOfDay();
        $endDate = now()->endOfDay();
        $password = Hash::make('123456');

        $variants = DB::table('product_variants')
            ->join('products', 'products.id', '=', 'product_variants.product_id')
            ->where('product_variants.status', 1)
            ->where('products.status', 1)
            ->select([
                'product_variants.id',
                'product_variants.price',
                'product_variants.sale_price',
            ])
            ->get();

        if ($variants->isEmpty()) {
            $this->command?->warn('Bỏ qua dữ liệu demo: chưa có biến thể sản phẩm hoạt động.');
            return;
        }

        DB::transaction(function () use ($faker, $startDate, $endDate, $password, $variants) {
            for ($customerNumber = 1; $customerNumber <= 24; $customerNumber++) {
                $username = sprintf('demo_customer_%02d', $customerNumber);
                $email = $username . '@example.test';
                $createdAt = $customerNumber === 1
                    ? $startDate->copy()
                    : $this->randomDate($faker, $startDate, $endDate->copy()->subDays(30));

                DB::table('nguoidung')->updateOrInsert(
                    ['user' => $username],
                    [
                        'email' => $email,
                        'address' => $faker->address(),
                        'tel' => '09' . $faker->numerify('########'),
                        'pass' => $password,
                        'role' => 0,
                        'created_at' => $createdAt,
                        'updated_at' => $createdAt,
                    ]
                );

                $customerName = $faker->name();
                $orderCount = $faker->numberBetween(2, 6);

                for ($orderNumber = 1; $orderNumber <= $orderCount; $orderNumber++) {
                    $orderKey = sprintf('DEMO_SEED_ORDER_%02d_%02d', $customerNumber, $orderNumber);

                    if (DB::table('orders')->where('note', $orderKey)->exists()) {
                        if ($customerNumber === 1 && $orderNumber === 1) {
                            $firstDemoOrderDate = $startDate->copy()->addDays(7);

                            DB::table('orders')->where('note', $orderKey)->update([
                                'created_at' => $firstDemoOrderDate,
                                'updated_at' => $firstDemoOrderDate,
                            ]);
                        }

                        continue;
                    }

                    $orderDate = $customerNumber === 1 && $orderNumber === 1
                        ? $startDate->copy()->addDays(7)
                        : $this->randomDate($faker, $createdAt, $endDate);
                    $status = $orderDate->lt(now()->subDays(14))
                        ? 'completed'
                        : $faker->randomElement(['confirmed', 'shipping', 'completed']);
                    $paymentMethod = $faker->randomElement(['cod', 'vnpay']);
                    $selectedVariants = $variants->random($faker->numberBetween(1, 3));
                    $selectedVariants = $selectedVariants instanceof \stdClass
                        ? collect([$selectedVariants])
                        : collect($selectedVariants);

                    $items = [];
                    $totalPrice = 0;

                    foreach ($selectedVariants as $variant) {
                        $quantity = $faker->numberBetween(1, 2);
                        $price = (float) ($variant->sale_price ?? $variant->price);
                        $totalPrice += $price * $quantity;
                        $items[] = [
                            'product_variant_id' => $variant->id,
                            'quantity' => $quantity,
                            'price' => $price,
                        ];
                    }

                    $orderId = DB::table('orders')->insertGetId([
                        'customer_name' => $customerName,
                        'phone' => '09' . $faker->numerify('########'),
                        'email' => $email,
                        'address' => $faker->address(),
                        'note' => $orderKey,
                        'total_price' => $totalPrice,
                        'payment_method' => $paymentMethod,
                        'status' => $status,
                        'created_at' => $orderDate,
                        'updated_at' => $orderDate,
                    ]);

                    foreach ($items as $item) {
                        DB::table('order_items')->insert([
                            'order_id' => $orderId,
                            'product_variant_id' => $item['product_variant_id'],
                            'quantity' => $item['quantity'],
                            'price' => $item['price'],
                            'created_at' => $orderDate,
                            'updated_at' => $orderDate,
                        ]);
                    }
                }
            }
        });

        $this->command?->info('Đã tạo/cập nhật 24 khách hàng demo và dữ liệu mua hàng từ 11/2025 đến hiện tại.');
    }

    private function randomDate($faker, Carbon $from, Carbon $to): Carbon
    {
        $fromTimestamp = $from->timestamp;
        $toTimestamp = max($fromTimestamp, $to->timestamp);

        return Carbon::createFromTimestamp($faker->numberBetween($fromTimestamp, $toTimestamp));
    }
}
