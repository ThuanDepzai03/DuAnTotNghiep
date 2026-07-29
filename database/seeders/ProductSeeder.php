<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // ================= APPLE =================

            [
                'name' => 'iPad 10 WiFi',
                'brand_id' => 1,
                'category_id' => 3,
                'variants' => [
                    ['color' => 'Xanh dương', 'ram' => '4GB', 'storage' => '64GB', 'image' => 'image/ipad10_blue_64.jpg', 'price' => 8990000],
                    ['color' => 'Hồng', 'ram' => '4GB', 'storage' => '64GB', 'image' => 'image/ipad10_pink_64.jpg', 'price' => 8990000],
                    ['color' => 'Bạc', 'ram' => '4GB', 'storage' => '64GB', 'image' => 'image/ipad10_silver_64.jpg', 'price' => 8990000],
                    ['color' => 'Vàng', 'ram' => '4GB', 'storage' => '64GB', 'image' => 'image/ipad10_yellow_64.jpg', 'price' => 8990000],

                    ['color' => 'Xanh dương', 'ram' => '4GB', 'storage' => '256GB', 'image' => 'image/ipad10_blue.jpg', 'price' => 12990000],
                    ['color' => 'Hồng', 'ram' => '4GB', 'storage' => '256GB', 'image' => 'image/ipad10_pink.jpg', 'price' => 12990000],
                    ['color' => 'Bạc', 'ram' => '4GB', 'storage' => '256GB', 'image' => 'image/ipad10_silver.jpg', 'price' => 12990000],
                    ['color' => 'Vàng', 'ram' => '4GB', 'storage' => '256GB', 'image' => 'image/ipad10_yellow.jpg', 'price' => 12990000],
                ],
            ],

            [
                'name' => 'iPhone 13',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Đen', 'ram' => '4GB', 'storage' => '128GB', 'image' => 'image/iphone13_black.jpg', 'price' => 10990000],
                    ['color' => 'Đen', 'ram' => '4GB', 'storage' => '256GB', 'image' => 'image/iphone13_black.jpg', 'price' => 12990000],

                    ['color' => 'Xanh dương', 'ram' => '4GB', 'storage' => '128GB', 'image' => 'image/iphone13_blue.jpg', 'price' => 10990000],
                    ['color' => 'Xanh dương', 'ram' => '4GB', 'storage' => '256GB', 'image' => 'image/iphone13_blue.jpg', 'price' => 12990000],

                    ['color' => 'Starlight', 'ram' => '4GB', 'storage' => '128GB', 'image' => 'image/iphone13_starlight.jpg', 'price' => 10990000],
                    ['color' => 'Starlight', 'ram' => '4GB', 'storage' => '256GB', 'image' => 'image/iphone13_starlight.jpg', 'price' => 12990000],
                ],
            ],

            [
                'name' => 'iPhone 14',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Midnight', 'ram' => '6GB', 'storage' => '128GB', 'image' => 'image/iphone14_midnight.jpg', 'price' => 13990000],
                    ['color' => 'Midnight', 'ram' => '6GB', 'storage' => '256GB', 'image' => 'image/iphone14_midnight.jpg', 'price' => 15990000],

                    ['color' => 'Starlight', 'ram' => '6GB', 'storage' => '128GB', 'image' => 'image/iphone14_starlight.jpg', 'price' => 13990000],
                    ['color' => 'Starlight', 'ram' => '6GB', 'storage' => '256GB', 'image' => 'image/iphone14_starlight.jpg', 'price' => 15990000],
                ],
            ],

            [
                'name' => 'iPhone 15',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Hồng', 'ram' => '6GB', 'storage' => '128GB', 'image' => 'image/iphone15_pink.jpg', 'price' => 17990000],
                    ['color' => 'Hồng', 'ram' => '6GB', 'storage' => '256GB', 'image' => 'image/iphone15_pink.jpg', 'price' => 19990000],

                    ['color' => 'Vàng', 'ram' => '6GB', 'storage' => '128GB', 'image' => 'image/iphone15_yellow.jpg', 'price' => 17990000],
                    ['color' => 'Vàng', 'ram' => '6GB', 'storage' => '256GB', 'image' => 'image/iphone15_yellow.jpg', 'price' => 19990000],
                ],
            ],

            [
                'name' => 'iPhone 16',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Đen', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/iphone16_black.jpg', 'price' => 22990000],
                    ['color' => 'Đen', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/iphone16_black.jpg', 'price' => 24990000],

                    ['color' => 'Trắng', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/iphone16_white.jpg', 'price' => 22990000],
                    ['color' => 'Trắng', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/iphone16_white.jpg', 'price' => 24990000],
                ],
            ],

            [
                'name' => 'iPhone 17 Pro Max',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Xanh dương', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/iphone17promax_blue.jpg', 'price' => 34990000],
                    ['color' => 'Xanh dương', 'ram' => '12GB', 'storage' => '512GB', 'image' => 'image/iphone17promax_blue.jpg', 'price' => 39990000],

                    ['color' => 'Titan', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/iphone17promax_titanium.jpg', 'price' => 34990000],
                    ['color' => 'Titan', 'ram' => '12GB', 'storage' => '512GB', 'image' => 'image/iphone17promax_titanium.jpg', 'price' => 39990000],
                ],
            ],

            // ================= SAMSUNG =================

            [
                'name' => 'Samsung Galaxy A35',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Tím Lilac', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/samsung_a35_lilac.jpg', 'price' => 7490000],
                    ['color' => 'Tím Lilac', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_a35_lilac.jpg', 'price' => 8490000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy A55',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Navy', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/samsung_a55_navy.jpg', 'price' => 9990000],
                    ['color' => 'Navy', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_a55_navy.jpg', 'price' => 10990000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy M54',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Bạc', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_m54_silver.jpg', 'price' => 8290000],
                    ['color' => 'Bạc', 'ram' => '8GB', 'storage' => '512GB', 'image' => 'image/samsung_m54_silver.jpg', 'price' => 9490000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy S23 FE',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Kem', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/samsung_s23_fe_cream.jpg', 'price' => 10990000],
                    ['color' => 'Kem', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_s23_fe_cream.jpg', 'price' => 11990000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy S24',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Vàng', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_s24_yellow.jpg', 'price' => 18990000],
                    ['color' => 'Vàng', 'ram' => '8GB', 'storage' => '512GB', 'image' => 'image/samsung_s24_yellow.jpg', 'price' => 20990000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy S24 Plus',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Đen', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/samsung_s24_plus_black.jpg', 'price' => 22990000],
                    ['color' => 'Đen', 'ram' => '12GB', 'storage' => '512GB', 'image' => 'image/samsung_s24_plus_black.jpg', 'price' => 24990000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Xám', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/samsung_s24_ultra_gray.jpg', 'price' => 26990000],
                    ['color' => 'Xám', 'ram' => '12GB', 'storage' => '512GB', 'image' => 'image/samsung_s24_ultra_gray.jpg', 'price' => 29990000],
                    ['color' => 'Xám', 'ram' => '12GB', 'storage' => '1TB', 'image' => 'image/samsung_s24_ultra_gray.jpg', 'price' => 33990000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy Z Flip5',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Mint', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_zflip5_mint.jpg', 'price' => 15990000],
                    ['color' => 'Mint', 'ram' => '8GB', 'storage' => '512GB', 'image' => 'image/samsung_zflip5_mint.jpg', 'price' => 17990000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy Z Fold5',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Xanh dương', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/samsung_zfold5_blue.jpg', 'price' => 29990000],
                    ['color' => 'Xanh dương', 'ram' => '12GB', 'storage' => '512GB', 'image' => 'image/samsung_zfold5_blue.jpg', 'price' => 32990000],
                    ['color' => 'Xanh dương', 'ram' => '12GB', 'storage' => '1TB', 'image' => 'image/samsung_zfold5_blue.jpg', 'price' => 36990000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy Tab S9',
                'brand_id' => 2,
                'category_id' => 3,
                'variants' => [
                    ['color' => 'Be', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/samsung_tab_s9_beige.jpg', 'price' => 16990000],
                    ['color' => 'Be', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_tab_s9_beige.jpg', 'price' => 18990000],
                ],
            ],

            [
                'name' => 'Samsung Galaxy Tab S10',
                'brand_id' => 2,
                'category_id' => 3,
                'variants' => [
                    ['color' => 'Xám', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/tabs10.jpg', 'price' => 20990000],
                    ['color' => 'Xám', 'ram' => '12GB', 'storage' => '512GB', 'image' => 'image/tabs10.jpg', 'price' => 23990000],
                ],
            ],
        ];

        $colors = AttributeValue::whereHas('attribute', function ($query) {
            $query->where('name', 'Màu sắc');
        })->pluck('id', 'value')->all();

        $rams = AttributeValue::whereHas('attribute', function ($query) {
            $query->where('name', 'RAM');
        })->pluck('id', 'value')->all();

        $storages = AttributeValue::whereHas('attribute', function ($query) {
            $query->where('name', 'Bộ nhớ');
        })->pluck('id', 'value')->all();

        foreach ($products as $index => $item) {
            $firstVariant = $item['variants'][0];

            $product = Product::create([
                'category_id' => $item['category_id'],
                'brand_id' => $item['brand_id'],
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'sku' => 'SP' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'description' => $item['name'] . ' chính hãng, bảo hành 12 tháng.',
                'thumbnail' => $firstVariant['image'],
                'status' => 1,
            ]);

            foreach ($item['variants'] as $variantIndex => $data) {
                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $product->sku . '-V' . ($variantIndex + 1),
                    'price' => $data['price'],
                    'sale_price' => $data['price'] - 500000,
                    'stock' => rand(10, 50),
                    'image' => $data['image'],
                    'status' => 1,
                ]);

                $variant->attributeValues()->attach([
                    $colors[$data['color']],
                    $rams[$data['ram']],
                    $storages[$data['storage']],
                ]);
            }
        }
    }
}
