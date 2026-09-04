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
            ['name' => 'Điện thoại', 'parent' => null],
            ['name' => 'Laptop', 'parent' => null],
            ['name' => 'Máy tính bảng', 'parent' => 'dien-thoai'],
            ['name' => 'Đồng hồ', 'parent' => 'phu-kien'],
            ['name' => 'Tai nghe', 'parent' => 'phu-kien'],
            ['name' => 'Phụ kiện', 'parent' => null],
            ['name' => 'Ốp lưng', 'parent' => 'phu-kien'],
            ['name' => 'Bộ sạc', 'parent' => 'phu-kien'],
            ['name' => 'Củ sạc', 'parent' => 'bo-sac'],
            ['name' => 'Dây sạc', 'parent' => 'bo-sac'],
            ['name' => 'Kính cường lực', 'parent' => 'phu-kien'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'status' => 1,
                ]
            );
        }

        foreach ($categories as $category) {
            Category::where('slug', Str::slug($category['name']))->update([
                'parent_id' => $category['parent']
                    ? Category::where('slug', $category['parent'])->value('id')
                    : null,
            ]);
        }
    }
}
