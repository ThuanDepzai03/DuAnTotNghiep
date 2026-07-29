<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            "Apple",
            "Samsung",
            "Xiaomi",
            "OPPO",
            "Vivo",
            "Realme",
            "Honor",
            "Nokia",
            "Asus",
            "Lenovo"
        ];

        foreach ($brands as $brand){

            Brand::create([
                'name'=>$brand,
                'slug'=>\Illuminate\Support\Str::slug($brand),
                'logo'=>null,
                'status'=>1
            ]);

        }
    }
}
