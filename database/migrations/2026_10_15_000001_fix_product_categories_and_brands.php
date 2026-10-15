<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        // 1. Fix Categories Hierarchy
        $accessoryId = DB::table('categories')->where('slug', 'phu-kien')->value('id');
        $phoneId = DB::table('categories')->where('slug', 'dien-thoai')->value('id');
        $tabletId = DB::table('categories')->where('slug', 'may-tinh-bang')->value('id');
        $laptopId = DB::table('categories')->where('slug', 'laptop')->value('id');
        $chargerId = DB::table('categories')->where('slug', 'bo-sac')->value('id');
        $adapterId = DB::table('categories')->where('slug', 'cu-sac')->value('id');
        $cableId = DB::table('categories')->where('slug', 'day-sac')->value('id');
        $caseId = DB::table('categories')->where('slug', 'op-lung')->value('id');
        $headphoneId = DB::table('categories')->where('slug', 'tai-nghe')->value('id');
        $watchId = DB::table('categories')->where('slug', 'dong-ho')->value('id');
        $glassId = DB::table('categories')->where('slug', 'kinh-cuong-luc')->value('id');

        // Set top level categories (parent_id = null)
        if ($phoneId) {
            DB::table('categories')->where('id', $phoneId)->update(['parent_id' => null, 'updated_at' => $now]);
        }
        if ($accessoryId) {
            DB::table('categories')->where('id', $accessoryId)->update(['parent_id' => null, 'updated_at' => $now]);
        }
        if ($laptopId) {
            DB::table('categories')->where('id', $laptopId)->update(['parent_id' => null, 'updated_at' => $now]);
        }
        if ($tabletId) {
            DB::table('categories')->where('id', $tabletId)->update(['parent_id' => null, 'updated_at' => $now]);
        }

        // Set accessory children
        if ($accessoryId) {
            DB::table('categories')->whereIn('slug', ['tai-nghe', 'dong-ho', 'op-lung', 'bo-sac', 'kinh-cuong-luc'])
                ->update(['parent_id' => $accessoryId, 'updated_at' => $now]);
        }

        // Set bo-sac children
        if ($chargerId) {
            DB::table('categories')->whereIn('slug', ['cu-sac', 'day-sac'])
                ->update(['parent_id' => $chargerId, 'updated_at' => $now]);
        }

        // 2. Fix Brands
        $appleBrandId = DB::table('brands')->where('slug', 'apple')->value('id');
        $samsungBrandId = DB::table('brands')->where('slug', 'samsung')->value('id');
        $asusBrandId = DB::table('brands')->where('slug', 'asus')->value('id');
        $xiaomiBrandId = DB::table('brands')->where('slug', 'xiaomi')->value('id');

        // 3. Fix Product Category and Brand Assignments
        // All Samsung products
        if ($samsungBrandId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', 'Samsung Galaxy%')
                      ->orWhere('name', 'like', '%Samsung%');
                })
                ->update(['brand_id' => $samsungBrandId, 'updated_at' => $now]);
        }

        // All Apple products
        if ($appleBrandId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', 'iPhone%')
                      ->orWhere('name', 'like', 'iPad%')
                      ->orWhere('name', 'like', 'Apple%')
                      ->orWhere('name', 'like', 'MacBook%')
                      ->orWhere('name', 'like', '%MagSafe%');
                })
                ->update(['brand_id' => $appleBrandId, 'updated_at' => $now]);
        }

        // Phones (iPhone, Samsung Galaxy A/S/M/Z, Asus)
        if ($phoneId) {
            DB::table('products')
                ->where('name', 'like', 'iPhone%')
                ->update(['category_id' => $phoneId, 'updated_at' => $now]);

            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', 'Samsung Galaxy A%')
                      ->orWhere('name', 'like', 'Samsung Galaxy S%')
                      ->orWhere('name', 'like', 'Samsung Galaxy M%')
                      ->orWhere('name', 'like', 'Samsung Galaxy Z%');
                })
                ->where('name', 'not like', '%Case%')
                ->where('name', 'not like', '%chống sốc%')
                ->where('name', 'not like', '%Watch%')
                ->where('name', 'not like', '%Buds%')
                ->where('name', 'not like', '%Tab%')
                ->update(['category_id' => $phoneId, 'updated_at' => $now]);

            DB::table('products')
                ->where('name', 'Asus')
                ->update(['category_id' => $phoneId, 'brand_id' => $asusBrandId ?? 2, 'updated_at' => $now]);
        }

        // Tablets (iPad, Samsung Galaxy Tab)
        if ($tabletId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', 'iPad%')
                      ->orWhere('name', 'like', '%Galaxy Tab%');
                })
                ->update(['category_id' => $tabletId, 'updated_at' => $now]);
        }

        // Laptops (MacBook, Zephyrus)
        if ($laptopId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', '%MacBook%')
                      ->orWhere('name', 'like', '%Zephyrus%');
                })
                ->update(['category_id' => $laptopId, 'updated_at' => $now]);
        }

        // Cases (Ốp lưng, Clear Case, Silicone Case)
        if ($caseId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', '%Ốp lưng%')
                      ->orWhere('name', 'like', '%Clear Case%')
                      ->orWhere('name', 'like', '%Silicone Case%');
                })
                ->update(['category_id' => $caseId, 'updated_at' => $now]);
        }

        // Cables (Cáp, Dây, Cable)
        if ($cableId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', '%Cáp%')
                      ->orWhere('name', 'like', '%Dây sạc%')
                      ->orWhere('name', 'like', '%Cable%');
                })
                ->update(['category_id' => $cableId, 'updated_at' => $now]);
        }

        // Chargers & Adapters (Củ sạc, Adapter, GaN Charger)
        if ($adapterId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', '%Củ sạc%')
                      ->orWhere('name', 'like', '%Power Adapter%')
                      ->orWhere('name', 'like', '%GaN Charger%');
                })
                ->update(['category_id' => $adapterId, 'updated_at' => $now]);
        }

        // Power Banks (Pin dự phòng)
        if ($chargerId) {
            DB::table('products')
                ->where('name', 'like', '%Pin dự phòng%')
                ->update(['category_id' => $chargerId, 'updated_at' => $now]);
        }

        // Screen Protectors (Kính cường lực)
        if ($glassId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', '%Kính cường lực%')
                      ->orWhere('name', 'like', '%Tempered Glass%');
                })
                ->update(['category_id' => $glassId, 'updated_at' => $now]);
        }

        // Headphones (AirPods, Galaxy Buds)
        if ($headphoneId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', '%AirPods%')
                      ->orWhere('name', 'like', '%Buds%')
                      ->orWhere('name', 'like', '%Tai nghe%');
                })
                ->update(['category_id' => $headphoneId, 'updated_at' => $now]);
        }

        // Watches (Apple Watch, Galaxy Watch, Xiaomi Watch)
        if ($watchId) {
            DB::table('products')
                ->where(function ($q) {
                    $q->where('name', 'like', '%Apple Watch%')
                      ->orWhere('name', 'like', '%Galaxy Watch%')
                      ->orWhere('name', 'like', '%Xiaomi Watch%')
                      ->orWhere('name', 'like', '%Đồng hồ%');
                })
                ->update(['category_id' => $watchId, 'updated_at' => $now]);
        }

        // Hide test products 111 and 127
        DB::table('products')
            ->whereIn('id', [111, 127])
            ->update(['status' => 0, 'updated_at' => $now]);
    }

    public function down(): void
    {
    }
};
