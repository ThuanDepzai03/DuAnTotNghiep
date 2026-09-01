<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
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
            $status = (int) ($category->status ?? 1);

            $content .= "            [\n";
            $content .= "                'name' => '{$name}',\n";
            $content .= "                'slug' => '{$slug}',\n";
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
}
