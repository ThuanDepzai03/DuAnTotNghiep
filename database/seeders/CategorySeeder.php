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
            'Điện thoại',
            'Laptop',
            'Máy tính bảng',
            'Đồng hồ',
            'Tai nghe',
            'Phụ kiện',
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category)],
                [
                    'name' => $category,
                    'status' => 1,
                ]
            );
        }
    }
}
