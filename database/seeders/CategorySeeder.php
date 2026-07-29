<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            "Điện thoại",
            "Laptop",
            "Máy tính bảng",
            "Đồng hồ",
            "Tai nghe",
            "Phụ kiện",
        ];

        foreach ($categories as $category) {

            Category::create([
                'name' => $category,
                'slug' => \Illuminate\Support\Str::slug($category),
                'status' => 1
            ]);

        }
    }
}
