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
            'Apple' => 'uploads/brands/1788294398-uBO3K1Fdgkie.png',
            'Samsung' => 'uploads/brands/1788294412-NxXcgGem7C5I.png',
            'Xiaomi' => 'uploads/brands/1788294419-10sOFCpYwTeJ.png',
            'OPPO' => 'uploads/brands/1788294429-2d3Viq0jK3P7.png',
            'Vivo' => 'uploads/brands/1788294441-r9P05U4SQXeS.png',
            'Realme' => 'uploads/brands/1788294454-3somxKUMHBwz.png',
            'Honor' => 'uploads/brands/1788294469-fIftgdQSFjbh.png',
            'Nokia' => 'uploads/brands/1788294477-t1yBIx5db0ee.png',
            'Asus' => 'uploads/brands/1788294484-KIsWzYkUoHJf.png',
            'Lenovo' => 'uploads/brands/1788294492-Zz9WQHU5nsjb.png',
        ];

        foreach ($brands as $name => $logo) {
            Brand::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'logo' => $logo,
                    'status' => 1,
                ]
            );
        }
    }
}
