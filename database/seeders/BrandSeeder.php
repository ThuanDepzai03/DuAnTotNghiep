<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [            [
                'name' => 'Apple',
                'slug' => 'apple',
                'logo' => 'uploads/brands/1788294398-uBO3K1Fdgkie.png',
                'status' => 1,
            ],
            [
                'name' => 'Asus',
                'slug' => 'asus',
                'logo' => 'uploads/brands/1788296651-IsilGyY4niJU.png',
                'status' => 1,
            ],
            [
                'name' => 'Honor',
                'slug' => 'honor',
                'logo' => 'uploads/brands/1788294469-fIftgdQSFjbh.png',
                'status' => 1,
            ],
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo',
                'logo' => 'uploads/brands/1788294492-Zz9WQHU5nsjb.png',
                'status' => 1,
            ],
            [
                'name' => 'Nokia',
                'slug' => 'nokia',
                'logo' => 'uploads/brands/1788294477-t1yBIx5db0ee.png',
                'status' => 1,
            ],
            [
                'name' => 'OPPO',
                'slug' => 'oppo',
                'logo' => 'uploads/brands/1788294429-2d3Viq0jK3P7.png',
                'status' => 1,
            ],
            [
                'name' => 'Realme',
                'slug' => 'realme',
                'logo' => 'uploads/brands/1788294454-3somxKUMHBwz.png',
                'status' => 1,
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'logo' => 'uploads/brands/1788294412-NxXcgGem7C5I.png',
                'status' => 1,
            ],
            [
                'name' => 'Vivo',
                'slug' => 'vivo',
                'logo' => 'uploads/brands/1788294441-r9P05U4SQXeS.png',
                'status' => 1,
            ],
            [
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
                'logo' => 'uploads/brands/1788294419-10sOFCpYwTeJ.png',
                'status' => 1,
            ],
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