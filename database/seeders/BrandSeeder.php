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
                'logo' => 'uploads/brands/1788296743-N2736fcyImxH.png',
                'status' => 1,
            ],
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo',
                'logo' => 'uploads/brands/1788296751-LNR2hfyDq2ui.png',
                'status' => 1,
            ],
            [
                'name' => 'Motorola',
                'slug' => 'motorola',
                'logo' => 'uploads/brands/1788296991-KsZLDgvnfFNX.png',
                'status' => 1,
            ],
            [
                'name' => 'Nokia',
                'slug' => 'nokia',
                'logo' => 'uploads/brands/1788296761-ELhC7KhUXbFG.png',
                'status' => 1,
            ],
            [
                'name' => 'OPPO',
                'slug' => 'oppo',
                'logo' => 'uploads/brands/1788296769-jvEcHoISrF6j.png',
                'status' => 1,
            ],
            [
                'name' => 'Realme',
                'slug' => 'realme',
                'logo' => 'uploads/brands/1788296791-4cWIja65B0df.png',
                'status' => 1,
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'logo' => 'uploads/brands/1788296802-xC24KAT5OxC0.png',
                'status' => 1,
            ],
            [
                'name' => 'Vivo',
                'slug' => 'vivo',
                'logo' => 'uploads/brands/1788296810-MeJXK5mbMyLL.png',
                'status' => 1,
            ],
            [
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
                'logo' => 'uploads/brands/1788296819-R6rMZTP2LGQc.png',
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