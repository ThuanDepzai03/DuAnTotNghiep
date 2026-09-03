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
        // 1. Lấy ID thuộc tính từ Database (Màu sắc = 1, RAM = 2, Bộ nhớ = 3)
        $colors = AttributeValue::where('attribute_id', 1)->pluck('id', 'value')->all();
        $rams = AttributeValue::where('attribute_id', 2)->pluck('id', 'value')->all();
        $storages = AttributeValue::where('attribute_id', 3)->pluck('id', 'value')->all();

        // 2. Danh sách sản phẩm thực tế CHỈ SỬ DỤNG CÁC FILE ẢNH ĐANG CÓ TRONG public/image/ CỦA BẠN
        // Category 1: Điện thoại, Category 3: Máy tính bảng
        $baseProducts = [
            // ================= APPLE IPHONE =================
            [
                'name' => 'iPhone 13',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Midnight', 'ram' => '4GB', 'storage' => '128GB', 'image' => 'image/iphone13_black.jpg', 'price' => 13990000],
                    ['color' => 'Xanh dương', 'ram' => '4GB', 'storage' => '128GB', 'image' => 'image/iphone13_blue.jpg', 'price' => 13990000],
                    ['color' => 'Starlight', 'ram' => '4GB', 'storage' => '256GB', 'image' => 'image/iphone13_starlight.jpg', 'price' => 15990000],
                ],
            ],
            [
                'name' => 'iPhone 14',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Midnight', 'ram' => '6GB', 'storage' => '128GB', 'image' => 'image/iphone14_midnight.jpg', 'price' => 16490000],
                    ['color' => 'Starlight', 'ram' => '6GB', 'storage' => '256GB', 'image' => 'image/iphone14_starlight.jpg', 'price' => 19490000],
                ],
            ],
            [
                'name' => 'iPhone 15',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Hồng', 'ram' => '6GB', 'storage' => '128GB', 'image' => 'image/iphone15_pink.jpg', 'price' => 19990000],
                    ['color' => 'Vàng', 'ram' => '6GB', 'storage' => '256GB', 'image' => 'image/iphone15_yellow.jpg', 'price' => 22990000],
                ],
            ],
            [
                'name' => 'iPhone 16',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Đen', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/iphone16_black.jpg', 'price' => 22990000],
                    ['color' => 'Trắng', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/iphone16_white.jpg', 'price' => 25990000],
                ],
            ],
            [
                'name' => 'iPhone 17 Pro Max',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Xanh dương', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/iphone17promax_blue.jpg', 'price' => 34990000],
                    ['color' => 'Titan', 'ram' => '12GB', 'storage' => '512GB', 'image' => 'image/iphone17promax_titanium.jpg', 'price' => 39990000],
                ],
            ],

            // ================= APPLE IPAD =================
            [
                'name' => 'iPad Gen 10 WiFi',
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

            // ================= SAMSUNG GALAXY =================
            [
                'name' => 'Samsung Galaxy A35',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Tím Lilac', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/samsung_a35_lilac.jpg', 'price' => 7490000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy A55',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Navy', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/samsung_a55_navy.jpg', 'price' => 9990000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy M54',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Bạc', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_m54_silver.jpg', 'price' => 8290000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy S23 FE',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Kem', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/samsung_s23_fe_cream.jpg', 'price' => 10990000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Vàng', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_s24_yellow.jpg', 'price' => 18990000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy S24 Plus',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Đen', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/samsung_s24_plus_black.jpg', 'price' => 22990000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Xám', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/samsung_s24_ultra_gray.jpg', 'price' => 26990000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy Z Flip5',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Mint', 'ram' => '8GB', 'storage' => '256GB', 'image' => 'image/samsung_zflip5_mint.jpg', 'price' => 15990000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy Z Fold5',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    ['color' => 'Xanh dương', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/samsung_zfold5_blue.jpg', 'price' => 29990000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy Tab S9',
                'brand_id' => 2,
                'category_id' => 3,
                'variants' => [
                    ['color' => 'Be', 'ram' => '8GB', 'storage' => '128GB', 'image' => 'image/samsung_tab_s9_beige.jpg', 'price' => 16990000],
                ],
            ],
            [
                'name' => 'Samsung Galaxy Tab S10',
                'brand_id' => 2,
                'category_id' => 3,
                'variants' => [
                    ['color' => 'Xám', 'ram' => '12GB', 'storage' => '256GB', 'image' => 'image/6936a29f1020f_tabs10.jpg', 'price' => 20990000],
                ],
            ],
        ];

        // 3. Tạo thêm 30 sản phẩm mới, không trùng dữ liệu hiện có
        $suffixes = [
            ' Chính Hãng VN/A',
            ' LL/A Mỹ',
            ' ZA/A',
            ' Like New 99%',
            ' Lướt 98%',
            ' Nguyên Seal',
        ];

        $totalProducts = 0;

        // Lấy SKU lớn nhất hiện có trong database.
        // Ví dụ đang có SP0088 -> sản phẩm mới bắt đầu từ SP0089.
        $lastSkuNumber = Product::query()
            ->where('sku', 'like', 'SP%')
            ->get(['sku'])
            ->map(function ($product) {
                return (int) preg_replace('/\D/', '', $product->sku);
            })
            ->max() ?? 0;

        $skuCounter = $lastSkuNumber + 1;

        // Tạo danh sách slug hiện có để tránh trùng
        $existingSlugs = Product::pluck('slug')->flip()->toArray();

        // Tạo 30 sản phẩm
        while ($totalProducts < 30 && $lastSkuNumber < 130) {
            foreach ($baseProducts as $item) {
                if ($totalProducts >= 30) {
                    break;
                }

                // Chọn hậu tố dựa theo số sản phẩm
                $suffixIndex = intdiv($totalProducts, count($baseProducts));
                $suffix = $suffixes[$suffixIndex % count($suffixes)];

                $realName = $item['name'] . $suffix;

                /*
         * Tạo slug từ tên + SKU.
         *
         * Ví dụ:
         * iPhone 13 Chính Hãng VN/A
         * -> iphone-13-chinh-hang-vn-a-sp0089
         */
                $sku = 'SP' . str_pad($skuCounter, 4, '0', STR_PAD_LEFT);

                $baseSlug = Str::slug($realName);
                $slug = $baseSlug . '-' . strtolower($sku);

                // Kiểm tra thêm một lần nữa để chắc chắn slug không trùng
                $slugIndex = 1;

                while (
                    isset($existingSlugs[$slug]) ||
                    Product::where('slug', $slug)->exists()
                ) {
                    $slug = $baseSlug . '-' . strtolower($sku) . '-' . $slugIndex;
                    $slugIndex++;
                }

                // Đảm bảo SKU cũng không bị trùng
                while (Product::where('sku', $sku)->exists()) {
                    $skuCounter++;

                    $sku = 'SP' . str_pad(
                        $skuCounter,
                        4,
                        '0',
                        STR_PAD_LEFT
                    );

                    $slug = $baseSlug . '-' . strtolower($sku);

                    $slugIndex = 1;

                    while (
                        isset($existingSlugs[$slug]) ||
                        Product::where('slug', $slug)->exists()
                    ) {
                        $slug = $baseSlug . '-' . strtolower($sku) . '-' . $slugIndex;
                        $slugIndex++;
                    }
                }

                // Tạo sản phẩm
                $product = Product::create([
                    'category_id' => $item['category_id'],
                    'brand_id' => $item['brand_id'],
                    'name' => $realName,
                    'slug' => $slug,
                    'sku' => $sku,
                    'description' => $realName .
                        ' đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
                    'thumbnail' => $item['variants'][0]['image'],
                    'status' => 1,
                ]);

                // Đánh dấu slug vừa sử dụng
                $existingSlugs[$slug] = true;

                // Tạo các biến thể
                foreach ($item['variants'] as $variantIndex => $data) {

                    // Hàng Like New / Lướt giảm giá
                    $priceModifier = 1;

                    if (
                        str_contains($suffix, '99%') ||
                        str_contains($suffix, '98%')
                    ) {
                        $priceModifier = 0.8;
                    }

                    $finalPrice = (int) ($data['price'] * $priceModifier);

                    // SKU biến thể
                    $variantSku = $product->sku . '-V' . ($variantIndex + 1);

                    // Nếu SKU biến thể đã tồn tại thì tạo số khác
                    $variantCounter = 1;
                    $originalVariantSku = $variantSku;

                    while (
                        ProductVariant::where('sku', $variantSku)->exists()
                    ) {
                        $variantSku = $originalVariantSku . '-' . $variantCounter;
                        $variantCounter++;
                    }

                    $variant = ProductVariant::create([
                        'product_id' => $product->id,
                        'sku' => $variantSku,
                        'price' => $finalPrice,
                        'sale_price' => max(0, $finalPrice - 500000),
                        'stock' => rand(10, 40),
                        'image' => $data['image'],
                        'status' => 1,
                    ]);

                    // Gắn thuộc tính
                    $attachData = [];

                    if (
                        isset($data['color']) &&
                        isset($colors[$data['color']])
                    ) {
                        $attachData[] = $colors[$data['color']];
                    }

                    if (
                        isset($data['ram']) &&
                        isset($rams[$data['ram']])
                    ) {
                        $attachData[] = $rams[$data['ram']];
                    }

                    if (
                        isset($data['storage']) &&
                        isset($storages[$data['storage']])
                    ) {
                        $attachData[] = $storages[$data['storage']];
                    }

                    if (!empty($attachData)) {
                        $variant->attributeValues()->sync(
                            array_unique($attachData)
                        );
                    }
                }

                $totalProducts++;
                $skuCounter++;
            }
        }

        // ============================================================
        // SẢN PHẨM BỔ SUNG - COMMIT #8
        // ============================================================

        $sku = 'SP0131';

        // Nếu SP0131 chưa tồn tại thì mới tạo
        if (!Product::where('sku', $sku)->exists()) {

            $item = [
                'name' => 'iPhone 13 Chính Hãng VN/A',
                'brand_id' => 1,
                'category_id' => 1,
                'variants' => [
                    [
                        'color' => 'Midnight',
                        'ram' => '4GB',
                        'storage' => '128GB',
                        'image' => 'image/iphone13_black.jpg',
                        'price' => 13990000,
                    ],
                    [
                        'color' => 'Xanh dương',
                        'ram' => '4GB',
                        'storage' => '128GB',
                        'image' => 'image/iphone13_blue.jpg',
                        'price' => 13990000,
                    ],
                    [
                        'color' => 'Starlight',
                        'ram' => '4GB',
                        'storage' => '256GB',
                        'image' => 'image/iphone13_starlight.jpg',
                        'price' => 15990000,
                    ],
                ],
            ];

            $slug = Str::slug($item['name']) . '-' . strtolower($sku);

            $product = Product::create([
                'category_id' => $item['category_id'],
                'brand_id' => $item['brand_id'],
                'name' => $item['name'],
                'slug' => $slug,
                'sku' => $sku,
                'description' => $item['name'] .
                    ' đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
                'thumbnail' => $item['variants'][0]['image'],
                'status' => 1,
            ]);

            // Tạo các biến thể
            foreach ($item['variants'] as $variantIndex => $data) {

                $variantSku = $sku . '-V' . ($variantIndex + 1);

                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $variantSku,
                    'price' => $data['price'],
                    'sale_price' => max(0, $data['price'] - 500000),
                    'stock' => rand(10, 40),
                    'image' => $data['image'],
                    'status' => 1,
                ]);

                // Gắn thuộc tính
                $attachData = [];

                if (
                    isset($data['color']) &&
                    isset($colors[$data['color']])
                ) {
                    $attachData[] = $colors[$data['color']];
                }

                if (
                    isset($data['ram']) &&
                    isset($rams[$data['ram']])
                ) {
                    $attachData[] = $rams[$data['ram']];
                }

                if (
                    isset($data['storage']) &&
                    isset($storages[$data['storage']])
                ) {
                    $attachData[] = $storages[$data['storage']];
                }

                if (!empty($attachData)) {
                    $variant->attributeValues()->sync(
                        array_unique($attachData)
                    );
                }
            }

            echo "Đã tạo sản phẩm #131 - {$item['name']} - {$sku}\n";
        } else {
            echo "SP0131 đã tồn tại, không tạo lại.\n";
        }

        // ============================================================
        // SẢN PHẨM BỔ SUNG - COMMIT #9
        // ============================================================

        $sku = 'SP0132';

        // Nếu SP0132 chưa tồn tại thì mới tạo
        if (!Product::where('sku', $sku)->exists()) {

            $item = [
                'name' => 'Samsung Galaxy A35 LL/A Mỹ',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    [
                        'color' => 'Tím Lilac',
                        'ram' => '8GB',
                        'storage' => '128GB',
                        'image' => 'image/samsung_a35_lilac.jpg',
                        'price' => 7490000,
                    ],
                ],
            ];

            $slug = Str::slug($item['name']) . '-' . strtolower($sku);

            $product = Product::create([
                'category_id' => $item['category_id'],
                'brand_id' => $item['brand_id'],
                'name' => $item['name'],
                'slug' => $slug,
                'sku' => $sku,
                'description' => $item['name'] .
                    ' đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
                'thumbnail' => $item['variants'][0]['image'],
                'status' => 1,
            ]);

            // Tạo biến thể
            foreach ($item['variants'] as $variantIndex => $data) {

                $variantSku = $sku . '-V' . ($variantIndex + 1);

                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $variantSku,
                    'price' => $data['price'],
                    'sale_price' => max(0, $data['price'] - 500000),
                    'stock' => rand(10, 40),
                    'image' => $data['image'],
                    'status' => 1,
                ]);

                // Gắn thuộc tính
                $attachData = [];

                if (
                    isset($data['color']) &&
                    isset($colors[$data['color']])
                ) {
                    $attachData[] = $colors[$data['color']];
                }

                if (
                    isset($data['ram']) &&
                    isset($rams[$data['ram']])
                ) {
                    $attachData[] = $rams[$data['ram']];
                }

                if (
                    isset($data['storage']) &&
                    isset($storages[$data['storage']])
                ) {
                    $attachData[] = $storages[$data['storage']];
                }

                if (!empty($attachData)) {
                    $variant->attributeValues()->sync(
                        array_unique($attachData)
                    );
                }
            }

            echo "Đã tạo sản phẩm #132 - {$item['name']} - {$sku}\n";
        } else {
            echo "SP0131 đã tồn tại, không tạo lại.\n";
        }

        // ============================================================
        // SẢN PHẨM BỔ SUNG - COMMIT #9
        // ============================================================

        $sku = 'SP0132';

        // Nếu SP0132 chưa tồn tại thì mới tạo
        if (!Product::where('sku', $sku)->exists()) {

            $item = [
                'name' => 'Samsung Galaxy A35 LL/A Mỹ',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    [
                        'color' => 'Tím Lilac',
                        'ram' => '8GB',
                        'storage' => '128GB',
                        'image' => 'image/samsung_a35_lilac.jpg',
                        'price' => 7490000,
                    ],
                ],
            ];

            $slug = Str::slug($item['name']) . '-' . strtolower($sku);

            $product = Product::create([
                'category_id' => $item['category_id'],
                'brand_id' => $item['brand_id'],
                'name' => $item['name'],
                'slug' => $slug,
                'sku' => $sku,
                'description' => $item['name'] .
                    ' đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
                'thumbnail' => $item['variants'][0]['image'],
                'status' => 1,
            ]);

            // Tạo biến thể
            foreach ($item['variants'] as $variantIndex => $data) {

                $variantSku = $sku . '-V' . ($variantIndex + 1);

                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $variantSku,
                    'price' => $data['price'],
                    'sale_price' => max(0, $data['price'] - 500000),
                    'stock' => rand(10, 40),
                    'image' => $data['image'],
                    'status' => 1,
                ]);

                // Gắn thuộc tính
                $attachData = [];

                if (
                    isset($data['color']) &&
                    isset($colors[$data['color']])
                ) {
                    $attachData[] = $colors[$data['color']];
                }

                if (
                    isset($data['ram']) &&
                    isset($rams[$data['ram']])
                ) {
                    $attachData[] = $rams[$data['ram']];
                }

                if (
                    isset($data['storage']) &&
                    isset($storages[$data['storage']])
                ) {
                    $attachData[] = $storages[$data['storage']];
                }

                if (!empty($attachData)) {
                    $variant->attributeValues()->sync(
                        array_unique($attachData)
                    );
                }
            }

            echo "Đã tạo sản phẩm #132 - {$item['name']} - {$sku}\n";
        } else {
            echo "SP0132 đã tồn tại, không tạo lại.\n";
        }
        // ============================================================
        // SẢN PHẨM BỔ SUNG - COMMIT #9
        // ============================================================

        $sku = 'SP0132';

        // Nếu SP0132 chưa tồn tại thì mới tạo
        if (!Product::where('sku', $sku)->exists()) {

            $item = [
                'name' => 'Samsung Galaxy A35 LL/A Mỹ',
                'brand_id' => 2,
                'category_id' => 1,
                'variants' => [
                    [
                        'color' => 'Tím Lilac',
                        'ram' => '8GB',
                        'storage' => '128GB',
                        'image' => 'image/samsung_a35_lilac.jpg',
                        'price' => 7490000,
                    ],
                ],
            ];

            $slug = Str::slug($item['name']) . '-' . strtolower($sku);

            $product = Product::create([
                'category_id' => $item['category_id'],
                'brand_id' => $item['brand_id'],
                'name' => $item['name'],
                'slug' => $slug,
                'sku' => $sku,
                'description' => $item['name'] .
                    ' đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
                'thumbnail' => $item['variants'][0]['image'],
                'status' => 1,
            ]);

            // Tạo biến thể
            foreach ($item['variants'] as $variantIndex => $data) {

                $variantSku = $sku . '-V' . ($variantIndex + 1);

                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $variantSku,
                    'price' => $data['price'],
                    'sale_price' => max(0, $data['price'] - 500000),
                    'stock' => rand(10, 40),
                    'image' => $data['image'],
                    'status' => 1,
                ]);

                // Gắn thuộc tính
                $attachData = [];

                if (
                    isset($data['color']) &&
                    isset($colors[$data['color']])
                ) {
                    $attachData[] = $colors[$data['color']];
                }

                if (
                    isset($data['ram']) &&
                    isset($rams[$data['ram']])
                ) {
                    $attachData[] = $rams[$data['ram']];
                }

                if (
                    isset($data['storage']) &&
                    isset($storages[$data['storage']])
                ) {
                    $attachData[] = $storages[$data['storage']];
                }

                if (!empty($attachData)) {
                    $variant->attributeValues()->sync(
                        array_unique($attachData)
                    );
                }
            }

            echo "Đã tạo sản phẩm #132 - {$item['name']} - {$sku}\n";
        } else {
            echo "SP0132 đã tồn tại, không tạo lại.\n";
        }
    }
}
