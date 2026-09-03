<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Chính Hãng',
  'slug' => 'iphone-13-chinh-hang-1',
  'sku' => 'SP0001',
  'description' => 'iPhone 13 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0001-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 36,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0001-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 23,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0001-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 32,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 Chính Hãng',
  'slug' => 'iphone-14-chinh-hang-2',
  'sku' => 'SP0002',
  'description' => 'iPhone 14 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0002-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 33,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0002-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 23,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 Chính Hãng',
  'slug' => 'iphone-15-chinh-hang-3',
  'sku' => 'SP0003',
  'description' => 'iPhone 15 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0003-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 29,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0003-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 11,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 Chính Hãng',
  'slug' => 'iphone-16-chinh-hang-4',
  'sku' => 'SP0004',
  'description' => 'iPhone 16 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0004-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 14,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0004-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 17,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max Chính Hãng',
  'slug' => 'iphone-17-pro-max-chinh-hang-5',
  'sku' => 'SP0005',
  'description' => 'iPhone 17 Pro Max Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0005-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 31,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0005-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 35,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi Chính Hãng',
  'slug' => 'ipad-gen-10-wifi-chinh-hang-6',
  'sku' => 'SP0006',
  'description' => 'iPad Gen 10 WiFi Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0006-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 35,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 24,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 11,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 13,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 35,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 11,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 26,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 14,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy A35 Chính Hãng',
  'slug' => 'samsung-galaxy-a35-chinh-hang',
  'sku' => 'SP0007',
  'description' => 'Samsung Galaxy A35 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0007-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 21,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy A55 Chính Hãng',
  'slug' => 'samsung-galaxy-a55-chinh-hang',
  'sku' => 'SP0008',
  'description' => 'Samsung Galaxy A55 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0008-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 23,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy M54 Chính Hãng',
  'slug' => 'samsung-galaxy-m54-chinh-hang',
  'sku' => 'SP0009',
  'description' => 'Samsung Galaxy M54 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0009-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 22,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S23 FE Chính Hãng',
  'slug' => 'samsung-galaxy-s23-fe-chinh-hang',
  'sku' => 'SP0010',
  'description' => 'Samsung Galaxy S23 FE Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0010-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 26,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 Chính Hãng',
  'slug' => 'samsung-galaxy-s24-chinh-hang',
  'sku' => 'SP0011',
  'description' => 'Samsung Galaxy S24 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0011-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 11,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 Plus Chính Hãng',
  'slug' => 'samsung-galaxy-s24-plus-chinh-hang',
  'sku' => 'SP0012',
  'description' => 'Samsung Galaxy S24 Plus Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0012-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 30,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 Ultra Chính Hãng',
  'slug' => 'samsung-galaxy-s24-ultra-chinh-hang',
  'sku' => 'SP0013',
  'description' => 'Samsung Galaxy S24 Ultra Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0013-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 31,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Z Flip5 Chính Hãng',
  'slug' => 'samsung-galaxy-z-flip5-chinh-hang',
  'sku' => 'SP0014',
  'description' => 'Samsung Galaxy Z Flip5 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0014-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 13,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Z Fold5 Chính Hãng',
  'slug' => 'samsung-galaxy-z-fold5-chinh-hang',
  'sku' => 'SP0015',
  'description' => 'Samsung Galaxy Z Fold5 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0015-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 39,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Tab S9 Chính Hãng',
  'slug' => 'samsung-galaxy-tab-s9-chinh-hang',
  'sku' => 'SP0016',
  'description' => 'Samsung Galaxy Tab S9 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0016-V1',
  'price' => '16990000.00',
  'sale_price' => '16490000.00',
  'stock' => 33,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Tab S10 Chính Hãng',
  'slug' => 'samsung-galaxy-tab-s10-chinh-hang',
  'sku' => 'SP0017',
  'description' => 'Samsung Galaxy Tab S10 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0017-V1',
  'price' => '20990000.00',
  'sale_price' => '20490000.00',
  'stock' => 22,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 LL/A Mỹ',
  'slug' => 'iphone-13-lla-my-18',
  'sku' => 'SP0018',
  'description' => 'iPhone 13 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0018-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 34,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0018-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 25,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0018-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 38,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 LL/A Mỹ',
  'slug' => 'iphone-14-lla-my-19',
  'sku' => 'SP0019',
  'description' => 'iPhone 14 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0019-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 29,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0019-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 19,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 LL/A Mỹ',
  'slug' => 'iphone-15-lla-my-20',
  'sku' => 'SP0020',
  'description' => 'iPhone 15 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0020-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 18,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0020-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 20,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 LL/A Mỹ',
  'slug' => 'iphone-16-lla-my-21',
  'sku' => 'SP0021',
  'description' => 'iPhone 16 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0021-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 17,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0021-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 40,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max LL/A Mỹ',
  'slug' => 'iphone-17-pro-max-lla-my-22',
  'sku' => 'SP0022',
  'description' => 'iPhone 17 Pro Max LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0022-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 31,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0022-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 25,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi LL/A Mỹ',
  'slug' => 'ipad-gen-10-wifi-lla-my-23',
  'sku' => 'SP0023',
  'description' => 'iPad Gen 10 WiFi LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0023-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 21,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 24,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 32,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 34,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 39,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 24,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 13,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 23,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy A35 LL/A Mỹ',
  'slug' => 'samsung-galaxy-a35-lla-my',
  'sku' => 'SP0024',
  'description' => 'Samsung Galaxy A35 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0024-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 18,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy A55 LL/A Mỹ',
  'slug' => 'samsung-galaxy-a55-lla-my',
  'sku' => 'SP0025',
  'description' => 'Samsung Galaxy A55 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0025-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 36,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy M54 LL/A Mỹ',
  'slug' => 'samsung-galaxy-m54-lla-my',
  'sku' => 'SP0026',
  'description' => 'Samsung Galaxy M54 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0026-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 15,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S23 FE LL/A Mỹ',
  'slug' => 'samsung-galaxy-s23-fe-lla-my',
  'sku' => 'SP0027',
  'description' => 'Samsung Galaxy S23 FE LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0027-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 10,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 LL/A Mỹ',
  'slug' => 'samsung-galaxy-s24-lla-my',
  'sku' => 'SP0028',
  'description' => 'Samsung Galaxy S24 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0028-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 17,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 Plus LL/A Mỹ',
  'slug' => 'samsung-galaxy-s24-plus-lla-my',
  'sku' => 'SP0029',
  'description' => 'Samsung Galaxy S24 Plus LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0029-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 15,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 Ultra LL/A Mỹ',
  'slug' => 'samsung-galaxy-s24-ultra-lla-my',
  'sku' => 'SP0030',
  'description' => 'Samsung Galaxy S24 Ultra LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0030-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 12,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Z Flip5 LL/A Mỹ',
  'slug' => 'samsung-galaxy-z-flip5-lla-my',
  'sku' => 'SP0031',
  'description' => 'Samsung Galaxy Z Flip5 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0031-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 34,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Z Fold5 LL/A Mỹ',
  'slug' => 'samsung-galaxy-z-fold5-lla-my',
  'sku' => 'SP0032',
  'description' => 'Samsung Galaxy Z Fold5 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0032-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 34,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Tab S9 LL/A Mỹ',
  'slug' => 'samsung-galaxy-tab-s9-lla-my',
  'sku' => 'SP0033',
  'description' => 'Samsung Galaxy Tab S9 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0033-V1',
  'price' => '16990000.00',
  'sale_price' => '16490000.00',
  'stock' => 12,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Tab S10 LL/A Mỹ',
  'slug' => 'samsung-galaxy-tab-s10-lla-my',
  'sku' => 'SP0034',
  'description' => 'Samsung Galaxy Tab S10 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0034-V1',
  'price' => '20990000.00',
  'sale_price' => '20490000.00',
  'stock' => 26,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 ZA/A',
  'slug' => 'iphone-13-zaa-35',
  'sku' => 'SP0035',
  'description' => 'iPhone 13 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0035-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 20,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0035-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 26,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0035-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 35,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 ZA/A',
  'slug' => 'iphone-14-zaa-36',
  'sku' => 'SP0036',
  'description' => 'iPhone 14 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0036-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 14,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0036-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 19,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 ZA/A',
  'slug' => 'iphone-15-zaa-37',
  'sku' => 'SP0037',
  'description' => 'iPhone 15 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0037-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 22,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0037-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 18,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 ZA/A',
  'slug' => 'iphone-16-zaa-38',
  'sku' => 'SP0038',
  'description' => 'iPhone 16 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0038-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 25,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0038-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 34,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max ZA/A',
  'slug' => 'iphone-17-pro-max-zaa-39',
  'sku' => 'SP0039',
  'description' => 'iPhone 17 Pro Max ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0039-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 15,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0039-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 32,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi ZA/A',
  'slug' => 'ipad-gen-10-wifi-zaa-40',
  'sku' => 'SP0040',
  'description' => 'iPad Gen 10 WiFi ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0040-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 23,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 39,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 16,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 22,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 14,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 24,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 21,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 36,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy A35 ZA/A',
  'slug' => 'samsung-galaxy-a35-zaa',
  'sku' => 'SP0041',
  'description' => 'Samsung Galaxy A35 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0041-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 36,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy A55 ZA/A',
  'slug' => 'samsung-galaxy-a55-zaa',
  'sku' => 'SP0042',
  'description' => 'Samsung Galaxy A55 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0042-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 19,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy M54 ZA/A',
  'slug' => 'samsung-galaxy-m54-zaa',
  'sku' => 'SP0043',
  'description' => 'Samsung Galaxy M54 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0043-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 20,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S23 FE ZA/A',
  'slug' => 'samsung-galaxy-s23-fe-zaa',
  'sku' => 'SP0044',
  'description' => 'Samsung Galaxy S23 FE ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0044-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 28,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 ZA/A',
  'slug' => 'samsung-galaxy-s24-zaa',
  'sku' => 'SP0045',
  'description' => 'Samsung Galaxy S24 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0045-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 32,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 Plus ZA/A',
  'slug' => 'samsung-galaxy-s24-plus-zaa',
  'sku' => 'SP0046',
  'description' => 'Samsung Galaxy S24 Plus ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0046-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 34,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 Ultra ZA/A',
  'slug' => 'samsung-galaxy-s24-ultra-zaa',
  'sku' => 'SP0047',
  'description' => 'Samsung Galaxy S24 Ultra ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0047-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 17,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy Z Flip5 ZA/A',
  'slug' => 'samsung-galaxy-z-flip5-zaa',
  'sku' => 'SP0048',
  'description' => 'Samsung Galaxy Z Flip5 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0048-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 33,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 ZA/A',
  'slug' => 'samsung-galaxy-z-fold5-zaa-49',
  'sku' => 'SP0049',
  'description' => 'Samsung Galaxy Z Fold5 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0049-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 31,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S9 ZA/A',
  'slug' => 'samsung-galaxy-tab-s9-zaa-50',
  'sku' => 'SP0050',
  'description' => 'Samsung Galaxy Tab S9 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0050-V1',
  'price' => '16990000.00',
  'sale_price' => '16490000.00',
  'stock' => 27,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S10 ZA/A',
  'slug' => 'samsung-galaxy-tab-s10-zaa-51',
  'sku' => 'SP0051',
  'description' => 'Samsung Galaxy Tab S10 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0051-V1',
  'price' => '20990000.00',
  'sale_price' => '20490000.00',
  'stock' => 24,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Like New 99%',
  'slug' => 'iphone-13-like-new-99-52',
  'sku' => 'SP0052',
  'description' => 'iPhone 13 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0052-V1',
  'price' => '11192000.00',
  'sale_price' => '10692000.00',
  'stock' => 39,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0052-V2',
  'price' => '11192000.00',
  'sale_price' => '10692000.00',
  'stock' => 17,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0052-V3',
  'price' => '12792000.00',
  'sale_price' => '12292000.00',
  'stock' => 40,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 Like New 99%',
  'slug' => 'iphone-14-like-new-99-53',
  'sku' => 'SP0053',
  'description' => 'iPhone 14 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0053-V1',
  'price' => '13192000.00',
  'sale_price' => '12692000.00',
  'stock' => 23,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0053-V2',
  'price' => '15592000.00',
  'sale_price' => '15092000.00',
  'stock' => 37,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 Like New 99%',
  'slug' => 'iphone-15-like-new-99-54',
  'sku' => 'SP0054',
  'description' => 'iPhone 15 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0054-V1',
  'price' => '15992000.00',
  'sale_price' => '15492000.00',
  'stock' => 17,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0054-V2',
  'price' => '18392000.00',
  'sale_price' => '17892000.00',
  'stock' => 31,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 Like New 99%',
  'slug' => 'iphone-16-like-new-99-55',
  'sku' => 'SP0055',
  'description' => 'iPhone 16 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0055-V1',
  'price' => '18392000.00',
  'sale_price' => '17892000.00',
  'stock' => 35,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0055-V2',
  'price' => '20792000.00',
  'sale_price' => '20292000.00',
  'stock' => 37,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max Like New 99%',
  'slug' => 'iphone-17-pro-max-like-new-99-56',
  'sku' => 'SP0056',
  'description' => 'iPhone 17 Pro Max Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0056-V1',
  'price' => '27992000.00',
  'sale_price' => '27492000.00',
  'stock' => 13,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0056-V2',
  'price' => '31992000.00',
  'sale_price' => '31492000.00',
  'stock' => 25,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi Like New 99%',
  'slug' => 'ipad-gen-10-wifi-like-new-99-57',
  'sku' => 'SP0057',
  'description' => 'iPad Gen 10 WiFi Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0057-V1',
  'price' => '7192000.00',
  'sale_price' => '6692000.00',
  'stock' => 18,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V2',
  'price' => '7192000.00',
  'sale_price' => '6692000.00',
  'stock' => 18,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V3',
  'price' => '7192000.00',
  'sale_price' => '6692000.00',
  'stock' => 17,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V4',
  'price' => '7192000.00',
  'sale_price' => '6692000.00',
  'stock' => 39,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V5',
  'price' => '10392000.00',
  'sale_price' => '9892000.00',
  'stock' => 40,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V6',
  'price' => '10392000.00',
  'sale_price' => '9892000.00',
  'stock' => 16,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V7',
  'price' => '10392000.00',
  'sale_price' => '9892000.00',
  'stock' => 40,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V8',
  'price' => '10392000.00',
  'sale_price' => '9892000.00',
  'stock' => 14,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 Like New 99%',
  'slug' => 'samsung-galaxy-a35-like-new-99-58',
  'sku' => 'SP0058',
  'description' => 'Samsung Galaxy A35 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0058-V1',
  'price' => '5992000.00',
  'sale_price' => '5492000.00',
  'stock' => 24,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 Like New 99%',
  'slug' => 'samsung-galaxy-a55-like-new-99-59',
  'sku' => 'SP0059',
  'description' => 'Samsung Galaxy A55 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0059-V1',
  'price' => '7992000.00',
  'sale_price' => '7492000.00',
  'stock' => 24,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 Like New 99%',
  'slug' => 'samsung-galaxy-m54-like-new-99-60',
  'sku' => 'SP0060',
  'description' => 'Samsung Galaxy M54 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0060-V1',
  'price' => '6632000.00',
  'sale_price' => '6132000.00',
  'stock' => 19,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE Like New 99%',
  'slug' => 'samsung-galaxy-s23-fe-like-new-99-61',
  'sku' => 'SP0061',
  'description' => 'Samsung Galaxy S23 FE Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0061-V1',
  'price' => '8792000.00',
  'sale_price' => '8292000.00',
  'stock' => 22,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Like New 99%',
  'slug' => 'samsung-galaxy-s24-like-new-99-62',
  'sku' => 'SP0062',
  'description' => 'Samsung Galaxy S24 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0062-V1',
  'price' => '15192000.00',
  'sale_price' => '14692000.00',
  'stock' => 22,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Plus Like New 99%',
  'slug' => 'samsung-galaxy-s24-plus-like-new-99-63',
  'sku' => 'SP0063',
  'description' => 'Samsung Galaxy S24 Plus Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0063-V1',
  'price' => '18392000.00',
  'sale_price' => '17892000.00',
  'stock' => 15,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra Like New 99%',
  'slug' => 'samsung-galaxy-s24-ultra-like-new-99-64',
  'sku' => 'SP0064',
  'description' => 'Samsung Galaxy S24 Ultra Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0064-V1',
  'price' => '21592000.00',
  'sale_price' => '21092000.00',
  'stock' => 27,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 Like New 99%',
  'slug' => 'samsung-galaxy-z-flip5-like-new-99-65',
  'sku' => 'SP0065',
  'description' => 'Samsung Galaxy Z Flip5 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0065-V1',
  'price' => '12792000.00',
  'sale_price' => '12292000.00',
  'stock' => 24,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 Like New 99%',
  'slug' => 'samsung-galaxy-z-fold5-like-new-99-66',
  'sku' => 'SP0066',
  'description' => 'Samsung Galaxy Z Fold5 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0066-V1',
  'price' => '23992000.00',
  'sale_price' => '23492000.00',
  'stock' => 23,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S9 Like New 99%',
  'slug' => 'samsung-galaxy-tab-s9-like-new-99-67',
  'sku' => 'SP0067',
  'description' => 'Samsung Galaxy Tab S9 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0067-V1',
  'price' => '13592000.00',
  'sale_price' => '13092000.00',
  'stock' => 12,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S10 Like New 99%',
  'slug' => 'samsung-galaxy-tab-s10-like-new-99-68',
  'sku' => 'SP0068',
  'description' => 'Samsung Galaxy Tab S10 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0068-V1',
  'price' => '16792000.00',
  'sale_price' => '16292000.00',
  'stock' => 12,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Lướt 98%',
  'slug' => 'iphone-13-luot-98-69',
  'sku' => 'SP0069',
  'description' => 'iPhone 13 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0069-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 33,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0069-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 37,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0069-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 18,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 Lướt 98%',
  'slug' => 'iphone-14-luot-98-70',
  'sku' => 'SP0070',
  'description' => 'iPhone 14 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0070-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 12,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0070-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 36,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 Lướt 98%',
  'slug' => 'iphone-15-luot-98-71',
  'sku' => 'SP0071',
  'description' => 'iPhone 15 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0071-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 11,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0071-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 20,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 Lướt 98%',
  'slug' => 'iphone-16-luot-98-72',
  'sku' => 'SP0072',
  'description' => 'iPhone 16 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0072-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 32,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0072-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 15,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max Lướt 98%',
  'slug' => 'iphone-17-pro-max-luot-98-73',
  'sku' => 'SP0073',
  'description' => 'iPhone 17 Pro Max Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0073-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 33,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0073-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 38,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi Lướt 98%',
  'slug' => 'ipad-gen-10-wifi-luot-98-74',
  'sku' => 'SP0074',
  'description' => 'iPad Gen 10 WiFi Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0074-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 19,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 34,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 24,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 38,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 27,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 39,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 17,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 21,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 Lướt 98%',
  'slug' => 'samsung-galaxy-a35-luot-98-75',
  'sku' => 'SP0075',
  'description' => 'Samsung Galaxy A35 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0075-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 29,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 Lướt 98%',
  'slug' => 'samsung-galaxy-a55-luot-98-76',
  'sku' => 'SP0076',
  'description' => 'Samsung Galaxy A55 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0076-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 18,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 Lướt 98%',
  'slug' => 'samsung-galaxy-m54-luot-98-77',
  'sku' => 'SP0077',
  'description' => 'Samsung Galaxy M54 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0077-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 30,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE Lướt 98%',
  'slug' => 'samsung-galaxy-s23-fe-luot-98-78',
  'sku' => 'SP0078',
  'description' => 'Samsung Galaxy S23 FE Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0078-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 25,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Lướt 98%',
  'slug' => 'samsung-galaxy-s24-luot-98-79',
  'sku' => 'SP0079',
  'description' => 'Samsung Galaxy S24 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0079-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 34,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Plus Lướt 98%',
  'slug' => 'samsung-galaxy-s24-plus-luot-98-80',
  'sku' => 'SP0080',
  'description' => 'Samsung Galaxy S24 Plus Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0080-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 13,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra Lướt 98%',
  'slug' => 'samsung-galaxy-s24-ultra-luot-98-81',
  'sku' => 'SP0081',
  'description' => 'Samsung Galaxy S24 Ultra Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0081-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 34,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 Lướt 98%',
  'slug' => 'samsung-galaxy-z-flip5-luot-98-82',
  'sku' => 'SP0082',
  'description' => 'Samsung Galaxy Z Flip5 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0082-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 39,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 Lướt 98%',
  'slug' => 'samsung-galaxy-z-fold5-luot-98-83',
  'sku' => 'SP0083',
  'description' => 'Samsung Galaxy Z Fold5 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0083-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 35,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S9 Lướt 98%',
  'slug' => 'samsung-galaxy-tab-s9-luot-98-84',
  'sku' => 'SP0084',
  'description' => 'Samsung Galaxy Tab S9 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0084-V1',
  'price' => '16990000.00',
  'sale_price' => '16490000.00',
  'stock' => 33,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S10 Lướt 98%',
  'slug' => 'samsung-galaxy-tab-s10-luot-98-85',
  'sku' => 'SP0085',
  'description' => 'Samsung Galaxy Tab S10 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0085-V1',
  'price' => '20990000.00',
  'sale_price' => '20490000.00',
  'stock' => 38,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Nguyên Seal',
  'slug' => 'iphone-13-nguyen-seal-86',
  'sku' => 'SP0086',
  'description' => 'iPhone 13 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0086-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 21,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0086-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 25,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0086-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 25,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 Nguyên Seal',
  'slug' => 'iphone-14-nguyen-seal-87',
  'sku' => 'SP0087',
  'description' => 'iPhone 14 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0087-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 39,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0087-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 24,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 Nguyên Seal',
  'slug' => 'iphone-15-nguyen-seal-88',
  'sku' => 'SP0088',
  'description' => 'iPhone 15 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0088-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 36,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0088-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 36,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 Nguyên Seal',
  'slug' => 'iphone-16-nguyen-seal-89',
  'sku' => 'SP0089',
  'description' => 'iPhone 16 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0089-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 26,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0089-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 11,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max Nguyên Seal',
  'slug' => 'iphone-17-pro-max-nguyen-seal-90',
  'sku' => 'SP0090',
  'description' => 'iPhone 17 Pro Max Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0090-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 26,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0090-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 37,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi Nguyên Seal',
  'slug' => 'ipad-gen-10-wifi-nguyen-seal-91',
  'sku' => 'SP0091',
  'description' => 'iPad Gen 10 WiFi Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0091-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 16,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 29,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 28,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 16,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 32,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 35,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 15,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 27,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 Nguyên Seal',
  'slug' => 'samsung-galaxy-a35-nguyen-seal-92',
  'sku' => 'SP0092',
  'description' => 'Samsung Galaxy A35 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0092-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 33,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 Nguyên Seal',
  'slug' => 'samsung-galaxy-a55-nguyen-seal-93',
  'sku' => 'SP0093',
  'description' => 'Samsung Galaxy A55 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0093-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 18,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 Nguyên Seal',
  'slug' => 'samsung-galaxy-m54-nguyen-seal-94',
  'sku' => 'SP0094',
  'description' => 'Samsung Galaxy M54 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0094-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 31,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE Nguyên Seal',
  'slug' => 'samsung-galaxy-s23-fe-nguyen-seal-95',
  'sku' => 'SP0095',
  'description' => 'Samsung Galaxy S23 FE Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0095-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 19,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Nguyên Seal',
  'slug' => 'samsung-galaxy-s24-nguyen-seal-96',
  'sku' => 'SP0096',
  'description' => 'Samsung Galaxy S24 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0096-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 20,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Samsung Galaxy S24 Plus Nguyên Seal',
  'slug' => 'samsung-galaxy-s24-plus-nguyen-seal',
  'sku' => 'SP0097',
  'description' => 'Samsung Galaxy S24 Plus Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0097-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 15,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra Nguyên Seal',
  'slug' => 'samsung-galaxy-s24-ultra-nguyen-seal-98',
  'sku' => 'SP0098',
  'description' => 'Samsung Galaxy S24 Ultra Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0098-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 18,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 Nguyên Seal',
  'slug' => 'samsung-galaxy-z-flip5-nguyen-seal-99',
  'sku' => 'SP0099',
  'description' => 'Samsung Galaxy Z Flip5 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0099-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 30,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 Nguyên Seal',
  'slug' => 'samsung-galaxy-z-fold5-nguyen-seal-100',
  'sku' => 'SP0100',
  'description' => 'Samsung Galaxy Z Fold5 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0100-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 35,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 5,
  'brand_id' => 1,
  'name' => 'Apple AirPods Pro 3 2025 USB-C',
  'slug' => 'apple-airpods-pro-3-2025-usb-c',
  'sku' => 'APPLEAIRPODSPRO32025USBC-6KQ6',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; font-size: 28px !important; color: rgb(9, 13, 20) !important; line-height: 36px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/airpods_pro_3_mo_ta_1_6b24a13f8d.jpg" alt="airpods-pro-3-mo-ta-1.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 647.213px; width: 804px; max-width: 100%;" class="description-image" draggable="true"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/airpods_pro_3_mo_ta_2_883eb8e438.jpg" alt="airpods-pro-3-mo-ta-2.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 995.95px; width: 804px; max-width: 100%;" class="description-image" draggable="true"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/airpods_pro_3_mo_ta_3_3b378a90ef.jpg" alt="airpods-pro-3-mo-ta-3.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 890.425px; width: 804px; max-width: 100%;" class="description-image" draggable="true"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/airpods_pro_3_mo_ta_4_ade0c5f026.jpg" alt="airpods-pro-3-mo-ta-4.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 491.438px; width: 804px; max-width: 100%;" class="description-image" draggable="true"></p><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Đánh dấu bước tiến mới của Apple trong lĩnh vực tai nghe không dây, phiên bản AirPods Pro 3 sở hữu công nghệ khử ồn thế hệ mới, có chip H2 mạnh mẽ và tích hợp cả cảm biến nhịp tim. Sản phẩm gây ấn tượng bởi khả năng cá nhân hóa trải nghiệm người dùng và gia tăng thời lượng pin mạnh mẽ so với thế hệ trước.</span></p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/airpods_pro_3_1_50b306f63f.jpg" alt="airpods-pro-3-1.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 535.662px; width: 804px; max-width: 100%;" class="description-image" draggable="true"></figure><h2 style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; font-size: 20px !important; margin: revert !important; line-height: 28px !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Cảm giác đeo thoải mái hơn nhờ cải tiến thiết kế</span></h2><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;"><a href="https://fptshop.com.vn/phu-kien/tai-nghe-airpods-pro-3-2025-usb-c" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-decoration: inherit; color: rgb(48, 109, 228) !important; --tw-text-opacity: 1 !important;">AirPods Pro 3</a> tiếp tục phát huy triết lý thiết kế tối giản, gọn gàng nhưng bền bỉ của dòng AirPods. Trong đó, phần đệm tai được chế tác từ silicon, cho khả năng bám tai ổn định ngay cả khi người dùng vận động mạnh. Đây là lần đầu tiên Apple bổ sung tùy chọn nút tai size XXS, giúp sản phẩm phù hợp với nhiều dạng tai hơn, tạo cảm giác dễ chịu khi đeo suốt nhiều giờ liên tục, đồng thời tăng cường hiệu quả cách âm.</p><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;">Hộp sạc của sản phẩm đạt chuẩn kháng bụi và nước IP57, gia tăng độ bền bỉ khi sử dụng ở các môi trường đặc thù như phòng tập gym, dưới cơn mưa nhẹ hoặc trong những chuyến dã ngoại ngoài trời. Người dùng có thể an tâm đắm chìm vào điệu nhạc trong mọi hoạt động thường ngày và khi tập luyện thể thao.</p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/airpods_pro_3_c_cd2eef6bb6.jpg" alt="airpods-pro-3-c.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 535.662px; width: 804px; max-width: 100%;" class="description-image" draggable="true"></figure></div></div>',
  'thumbnail' => 'image/products/1788457809-47N7R1Gc.png',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'APPLEAIRPODSPRO32025USBC-6KQ6-KQV4',
  'price' => '6090000.00',
  'sale_price' => NULL,
  'stock' => 20,
  'image' => 'image/products/1788457809-47N7R1Gc.png',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 5,
  'brand_id' => 1,
  'name' => 'Tai nghe Apple AirPods Max 2024',
  'slug' => 'tai-nghe-apple-airpods-max-2024',
  'sku' => 'TAINGHEAPPLEAIRPODSMAX2024-SHYF',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; font-size: 28px !important; color: rgb(9, 13, 20) !important; line-height: 36px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><p class="MsoNormal" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;"><a href="https://fptshop.com.vn/phu-kien/tai-nghe-airpods-max-2024" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-decoration: inherit; color: rgb(48, 109, 228) !important; --tw-text-opacity: 1 !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">AirPods Max 2024</span></a><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;"> sẽ khiến bạn đắm chìm vào những tiết tấu có độ trung thực cao, đầy sống động và sâu lắng. Sản phẩm sở hữu thiết kế dạng chụp vừa vặn với nhiều lựa chọn về màu sắc. Tính năng </span><i style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Chủ Động Khử Tiếng Ồn</span></i><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;"> ở đẳng cấp Pro cho phép người nghe trải nghiệm không gian âm nhạc riêng tư ở bất cứ nơi nào.</span></p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/tai_nghe_airpods_max_2024_d_d446e17e90.jpg" alt="tai-nghe-airpods-max-2024-d.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 535.662px; width: 804px; max-width: 100%;" class="description-image" draggable="true"></figure><h2 class="MsoNormal" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; font-size: 20px !important; margin: revert !important; line-height: 28px !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Thiết kế tinh xảo, đẳng cấp và trang nhã</span></h2><p class="MsoNormal" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;">Là mẫu <a href="https://fptshop.com.vn/phu-kien/tai-nghe" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-decoration: inherit; color: rgb(48, 109, 228) !important; --tw-text-opacity: 1 !important;">tai nghe</a> cao cấp được thiết kế với dạng chụp tai, AirPods Max 2024 có kiểu dáng tinh xảo, thanh lịch và thể hiện độ hoàn thiện cao trong từng chi tiết. Cấu trúc mặt lưới thoáng khí sẽ nhẹ nhàng ôm lấy phần đầu của chúng ta khi đeo, không gây bí bách và tạo cảm nhận thoải mái suốt nhiều giờ nghe nhạc liên tục.</p><p class="MsoNormal" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;">Apple đã sử dụng foam hoạt tính mềm mại để chế tác hai bên đệm tai, đồng thời bọc thêm vải dệt lưới bên ngoài nhằm tăng độ êm ái tối đa. Bạn có thể kéo dài gọng đeo sao cho vừa vặn nhất với cỡ đầu của mình. Sản phẩm lên kệ với 5 phiên bản màu sắc trang nhã gồm: Đêm Xanh Thẳm, Ánh Sao, Xanh Dương, Tím và Cam.</p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/tai_nghe_airpods_max_2024_2_56ffd3fc9d.jpg" alt="tai-nghe-airpods-max-2024-2.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 535.662px; width: 804px; max-width: 100%;" class="description-image" draggable="true"></figure><h2 class="MsoNormal" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; font-size: 20px !important; margin: revert !important; line-height: 28px !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Dễ dàng tùy chỉnh với nút Digital Crown</span></h2><p class="MsoNormal" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;">Sự hiện diện của nút Digital Crown trên củ tai giúp người dùng dễ dàng thực hiện các tác vụ như phát nhạc/dừng nhạc, bật tiếng/tắt tiếng, nhận/kết thúc cuộc gọi hoặc chuyển ca khúc kế tiếp trong list nhạc. Ngoài ra, bạn còn có thể điều khiển âm lượng nhanh chóng bằng cách xoay nút nhẹ nhàng.</p><p class="MsoNormal" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin: revert !important;">Thiết kế tinh xảo với các khấc tăng độ ma sát và vị trí dễ thao tác của nút bấm đem lại trải nghiệm tiện lợi trong quá trình sử dụng, tạo nên sự khác biệt tinh tế so với các loại tai nghe chụp tai khác trên thị trường.</p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/tai_nghe_airpods_max_2024_3_ea02cf7aab.jpg" alt="tai-nghe-airpods-max-2024-3.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 535.662px; width: 804px; max-width: 100%;" class="description-image" draggable="true"></figure><h2 class="MsoNormal" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; font-size: 20px !important; margin: revert !important; line-height: 28px !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Tận hưởng âm thanh sống động và chi tiết</span></h2></div></div>',
  'thumbnail' => 'image/products/1788458027-ANQhdMjj.png',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'TAINGHEAPPLEAIRPODSMAX2024-SHYF-FSRE',
  'price' => '12690000.00',
  'sale_price' => NULL,
  'stock' => 23,
  'image' => 'image/products/1788458027-ANQhdMjj.png',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
),
                    ],
                ],
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::updateOrCreate(
                ['slug' => $productData['data']['slug']],
                $productData['data']
            );

            $variantSkus = array_map(
                fn (array $variantData): string => $variantData['data']['sku'],
                $productData['variants']
            );

            if ($variantSkus) {
                ProductVariant::where('product_id', $product->id)
                    ->whereNotIn('sku', $variantSkus)
                    ->delete();
            } else {
                ProductVariant::where('product_id', $product->id)->delete();
            }

            foreach ($productData['variants'] as $variantData) {
                $variant = ProductVariant::updateOrCreate(
                    ['sku' => $variantData['data']['sku']],
                    array_merge($variantData['data'], ['product_id' => $product->id])
                );

                $variant->attributeValues()->sync($variantData['attribute_value_ids']);
            }
        }
    }
}