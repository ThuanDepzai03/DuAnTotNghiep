<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributeIds = Attribute::whereIn('name', ['Màu sắc', 'RAM', 'Bộ nhớ'])->pluck('id', 'name');

        $mapping = [
            'dien-thoai' => ['Màu sắc', 'RAM', 'Bộ nhớ'],
            'may-tinh-bang' => ['Màu sắc', 'Bộ nhớ'],
            'laptop' => ['Màu sắc', 'RAM', 'Bộ nhớ'],
            'phu-kien' => ['Màu sắc'],
        ];

        foreach ($mapping as $categorySlug => $attributeNames) {
            $category = Category::where('slug', $categorySlug)->first();
            if (!$category) {
                continue;
            }

            foreach ($attributeNames as $attributeName) {
                $attributeId = $attributeIds[$attributeName] ?? null;
                if ($attributeId) {
                    $category->attributes()->syncWithoutDetaching([$attributeId => ['is_required' => false]]);
                }
            }
        }
    }
}
