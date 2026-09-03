<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeederSyncService
{
    public static function syncBrands(): void
    {
        if (app()->environment('production')) {
            return;
        }

        $brands = Brand::query()
            ->orderBy('name')
            ->get();

        $content = <<<'PHP'
<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
PHP;

        foreach ($brands as $brand) {
            $name = addslashes($brand->name ?? '');
            $slug = addslashes($brand->slug ?? Str::slug($brand->name ?? 'brand'));
            $logo = $brand->logo ? addslashes($brand->logo) : 'null';
            $status = (int) ($brand->status ?? 1);

            $content .= "            [\n";
            $content .= "                'name' => '{$name}',\n";
            $content .= "                'slug' => '{$slug}',\n";
            $content .= "                'logo' => " . ($logo === 'null' ? 'null' : "'{$logo}'") . ",\n";
            $content .= "                'status' => {$status},\n";
            $content .= "            ],\n";
        }

        $content .= <<<'PHP'
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['slug' => $brand['slug']],
                [
                    'name' => $brand['name'],
                    'logo' => $brand['logo'],
                    'status' => $brand['status'],
                ]
            );
        }
    }
}
PHP;

        file_put_contents(base_path('database/seeders/BrandSeeder.php'), $content);
    }

    public static function syncCategories(): void
    {
        if (app()->environment('production')) {
            return;
        }

        $categories = Category::query()
            ->orderBy('name')
            ->get();

        $content = <<<'PHP'
<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
PHP;

        foreach ($categories as $category) {
            $name = addslashes($category->name ?? '');
            $slug = addslashes($category->slug ?? Str::slug($category->name ?? 'category'));
            $parentSlug = $category->parent?->slug;
            $status = (int) ($category->status ?? 1);

            $content .= "            [\n";
            $content .= "                'name' => '{$name}',\n";
            $content .= "                'slug' => '{$slug}',\n";
            $content .= "                'parent_slug' => " . ($parentSlug ? "'" . addslashes($parentSlug) . "'" : 'null') . ",\n";
            $content .= "                'status' => {$status},\n";
            $content .= "            ],\n";
        }

        $content .= <<<'PHP'
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'status' => $category['status'],
                ]
            );
        }

        foreach ($categories as $category) {
            Category::where('slug', $category['slug'])->update([
                'parent_id' => $category['parent_slug']
                    ? Category::where('slug', $category['parent_slug'])->value('id')
                    : null,
            ]);
        }
    }
}
PHP;

        file_put_contents(base_path('database/seeders/CategorySeeder.php'), $content);
    }

    public static function syncBanners(): void
    {
        if (app()->environment('production')) {
            return;
        }

        $banners = Banner::query()
            ->orderBy('position')
            ->get();

        $content = <<<'PHP'
<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
PHP;

        foreach ($banners as $banner) {
            $title = addslashes($banner->title ?? '');
            $subtitle = addslashes($banner->subtitle ?? '');
            $image = $banner->image ? addslashes($banner->image) : 'null';
            $link = $banner->link ? addslashes($banner->link) : 'null';
            $type = addslashes($banner->type ?? 'hero');
            $position = (int) ($banner->position ?? 1);
            $status = (int) ($banner->status ?? 1);

            $content .= "            [\n";
            $content .= "                'title' => '{$title}',\n";
            $content .= "                'subtitle' => '{$subtitle}',\n";
            $content .= "                'image' => " . ($image === 'null' ? 'null' : "'{$image}'") . ",\n";
            $content .= "                'link' => " . ($link === 'null' ? 'null' : "'{$link}'") . ",\n";
            $content .= "                'type' => '{$type}',\n";
            $content .= "                'position' => {$position},\n";
            $content .= "                'status' => {$status},\n";
            $content .= "            ],\n";
        }

        $content .= <<<'PHP'
        ];

        foreach ($banners as $banner) {
            Banner::updateOrCreate(
                [
                    'title' => $banner['title'],
                    'type' => $banner['type'],
                    'position' => $banner['position'],
                ],
                [
                    'subtitle' => $banner['subtitle'],
                    'image' => $banner['image'],
                    'link' => $banner['link'],
                    'status' => $banner['status'],
                ]
            );
        }
    }
}
PHP;

        file_put_contents(base_path('database/seeders/BannerSeeder.php'), $content);
    }

    public static function syncProducts(): void
    {
        if (app()->environment('production')) {
            return;
        }

        $products = Product::query()
            ->with('variants.attributeValues')
            ->orderBy('id')
            ->get();

        $content = <<<'PHP'
<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
PHP;

        foreach ($products as $product) {
            $content .= "            [\n";
            $content .= "                'data' => " . self::phpValue([
                'category_id' => $product->category_id,
                'brand_id' => $product->brand_id,
                'name' => $product->name,
                'slug' => $product->slug,
                'sku' => $product->sku,
                'description' => $product->description,
                'thumbnail' => $product->thumbnail,
                'status' => (int) $product->status,
            ]) . ",\n";
            $content .= "                'variants' => [\n";

            foreach ($product->variants as $variant) {
                $content .= "                    [\n";
                $content .= "                        'data' => " . self::phpValue([
                    'sku' => $variant->sku,
                    'price' => $variant->price,
                    'sale_price' => $variant->sale_price,
                    'stock' => $variant->stock,
                    'image' => $variant->image,
                    'status' => (int) $variant->status,
                ]) . ",\n";
                $content .= "                        'attribute_value_ids' => " . self::phpValue(
                    $variant->attributeValues->pluck('id')->map(fn ($id) => (int) $id)->values()->all()
                ) . ",\n";
                $content .= "                    ],\n";
            }

            $content .= "                ],\n";
            $content .= "            ],\n";
        }

        $content .= <<<'PHP'
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
PHP;

        file_put_contents(base_path('database/seeders/ProductSeeder.php'), $content);
    }

    public static function syncVouchers(): void
    {
        if (app()->environment('production')) {
            return;
        }

        $vouchers = Voucher::query()->orderBy('code')->get();

        $content = <<<'PHP'
<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        $vouchers = [
PHP;

        foreach ($vouchers as $voucher) {
            $content .= '            ' . self::phpValue([
                'code' => $voucher->code,
                'name' => $voucher->name,
                'voucher_type' => $voucher->voucher_type,
                'discount_type' => $voucher->discount_type,
                'discount_value' => $voucher->discount_value,
                'max_discount' => $voucher->max_discount,
                'min_order' => $voucher->min_order,
                'quantity' => $voucher->quantity,
                'used_quantity' => $voucher->used_quantity,
                'start_date' => (string) $voucher->start_date,
                'end_date' => (string) $voucher->end_date,
                'status' => (int) $voucher->status,
            ]) . ",\n";
        }

        $content .= <<<'PHP'
        ];

        foreach ($vouchers as $voucher) {
            Voucher::updateOrCreate(
                ['code' => $voucher['code']],
                $voucher
            );
        }
    }
}
PHP;

        file_put_contents(base_path('database/seeders/VoucherSeeder.php'), $content);
    }

    public static function syncUsers(): void
    {
        if (app()->environment('production')) {
            return;
        }

        $users = DB::table('nguoidung')->orderBy('id')->get();

        $content = <<<'PHP'
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
PHP;

        foreach ($users as $user) {
            $content .= '            ' . self::phpValue([
                'user' => $user->user,
                'pass' => $user->pass,
                'email' => $user->email,
                'address' => $user->address,
                'tel' => $user->tel,
                'role' => (int) $user->role,
            ]) . ",\n";
        }

        $content .= <<<'PHP'
        ];

        foreach ($users as $user) {
            DB::table('nguoidung')->updateOrInsert(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
PHP;

        file_put_contents(base_path('database/seeders/UserSeeder.php'), $content);
    }

    private static function phpValue(mixed $value): string
    {
        return var_export($value, true);
    }
}
