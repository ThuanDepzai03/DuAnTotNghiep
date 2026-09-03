<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditionalCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::whereIn('slug', [
            'laptop',
            'dong-ho',
            'tai-nghe',
            'bo-sac',
            'op-lung',
        ])->pluck('id', 'slug');

        $brands = Brand::whereIn('slug', ['apple', 'asus', 'samsung', 'xiaomi'])
            ->pluck('id', 'slug');

        $colorValue = Attribute::where('name', 'Màu sắc')->with('values')->first()?->values->first()?->id;
        $products = [
            [
                'slug' => 'asus-rog-zephyrus-g14-2025',
                'name' => 'ASUS ROG Zephyrus G14 2025',
                'category' => 'laptop',
                'brand' => 'asus',
                'thumbnail' => 'image/products/asus-rog-zephyrus-g14-2025.jpg',
                'price' => 42990000,
                'sale_price' => 40990000,
                'stock' => 18,
            ],
            [
                'slug' => 'apple-macbook-air-m3-13-inch',
                'name' => 'Apple MacBook Air M3 13 inch',
                'category' => 'laptop',
                'brand' => 'apple',
                'thumbnail' => 'image/products/apple-macbook-air-m3-13-inch.jpg',
                'price' => 27990000,
                'sale_price' => 26490000,
                'stock' => 24,
            ],
            [
                'slug' => 'apple-watch-series-9',
                'name' => 'Apple Watch Series 9',
                'category' => 'dong-ho',
                'brand' => 'apple',
                'thumbnail' => 'image/products/apple-watch-series-9.jpg',
                'price' => 10990000,
                'sale_price' => 9990000,
                'stock' => 20,
            ],
            [
                'slug' => 'samsung-galaxy-watch6-classic',
                'name' => 'Samsung Galaxy Watch6 Classic',
                'category' => 'dong-ho',
                'brand' => 'samsung',
                'thumbnail' => 'image/products/samsung-galaxy-watch6-classic.jpg',
                'price' => 7490000,
                'sale_price' => 6490000,
                'stock' => 16,
            ],
            [
                'slug' => 'apple-airpods-pro-2',
                'name' => 'Apple AirPods Pro 2',
                'category' => 'tai-nghe',
                'brand' => 'apple',
                'thumbnail' => 'image/products/apple-airpods-pro-2.jpg',
                'price' => 6490000,
                'sale_price' => 5990000,
                'stock' => 35,
            ],
            [
                'slug' => 'samsung-galaxy-buds2-pro',
                'name' => 'Samsung Galaxy Buds2 Pro',
                'category' => 'tai-nghe',
                'brand' => 'samsung',
                'thumbnail' => 'image/products/samsung-galaxy-buds2-pro.jpg',
                'price' => 4990000,
                'sale_price' => 3990000,
                'stock' => 28,
            ],
            [
                'slug' => 'xiaomi-67w-charger',
                'name' => 'Xiaomi 67W GaN Charger',
                'category' => 'bo-sac',
                'brand' => 'xiaomi',
                'thumbnail' => 'image/products/xiaomi-67w-charger.jpg',
                'price' => 1190000,
                'sale_price' => 990000,
                'stock' => 45,
            ],
            [
                'slug' => 'apple-clear-case-magsafe',
                'name' => 'Apple Clear Case with MagSafe',
                'category' => 'op-lung',
                'brand' => 'apple',
                'thumbnail' => 'image/products/apple-clear-case-magsafe.jpg',
                'price' => 1490000,
                'sale_price' => 1290000,
                'stock' => 40,
            ],
        ];

        DB::transaction(function () use ($products, $categories, $brands, $colorValue) {
            foreach ($products as $data) {
                $product = Product::updateOrCreate(
                    ['slug' => $data['slug']],
                    [
                        'category_id' => $categories[$data['category']] ?? null,
                        'brand_id' => $brands[$data['brand']] ?? null,
                        'name' => $data['name'],
                        'sku' => strtoupper(str_replace('-', '', $data['slug'])) . '-DEMO',
                        'description' => 'Sản phẩm chính hãng, hình ảnh thực tế và thông tin tham khảo từ nhà sản xuất.',
                        'thumbnail' => $data['thumbnail'],
                        'status' => 1,
                    ]
                );

                $variant = ProductVariant::updateOrCreate(
                    ['sku' => strtoupper(str_replace('-', '', $data['slug'])) . '-V1'],
                    [
                        'product_id' => $product->id,
                        'price' => $data['price'],
                        'sale_price' => $data['sale_price'],
                        'stock' => $data['stock'],
                        'image' => $data['thumbnail'],
                        'status' => 1,
                    ]
                );

                if ($colorValue) {
                    $variant->attributeValues()->syncWithoutDetaching([$colorValue]);
                }
            }
        });

        $this->command?->info('Đã bổ sung 8 sản phẩm laptop, đồng hồ và phụ kiện.');
    }
}
