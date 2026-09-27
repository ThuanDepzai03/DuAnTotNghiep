<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [            [
                'name' => 'Bộ sạc',
                'slug' => 'bo-sac',
                'parent_slug' => 'dien-thoai',
                'status' => 1,
            ],
            [
                'name' => 'Củ sạc',
                'slug' => 'cu-sac',
                'parent_slug' => 'bo-sac',
                'status' => 1,
            ],
            [
                'name' => 'Dây sạc',
                'slug' => 'day-sac',
                'parent_slug' => 'bo-sac',
                'status' => 1,
            ],
            [
                'name' => 'Điện thoại',
                'slug' => 'dien-thoai',
                'parent_slug' => null,
                'status' => 1,
            ],
            [
                'name' => 'Đồng hồ',
                'slug' => 'dong-ho',
                'parent_slug' => 'phu-kien',
                'status' => 1,
            ],
            [
                'name' => 'Kính cường lực',
                'slug' => 'kinh-cuong-luc',
                'parent_slug' => 'phu-kien',
                'status' => 1,
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop',
                'parent_slug' => null,
                'status' => 1,
            ],
            [
                'name' => 'Máy tính bảng',
                'slug' => 'may-tinh-bang',
                'parent_slug' => 'dien-thoai',
                'status' => 1,
            ],
            [
                'name' => 'Ốp lưng',
                'slug' => 'op-lung',
                'parent_slug' => 'phu-kien',
                'status' => 1,
            ],
            [
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien',
                'parent_slug' => null,
                'status' => 1,
            ],
            [
                'name' => 'Tai nghe',
                'slug' => 'tai-nghe',
                'parent_slug' => 'phu-kien',
                'status' => 1,
            ],
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