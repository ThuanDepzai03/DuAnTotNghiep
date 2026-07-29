<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $color = Attribute::create([
            'name' => 'Màu sắc',
        ]);

        foreach ([
            'Đen',
            'Trắng',
            'Xanh dương',
            'Hồng',
            'Vàng',
            'Bạc',
            'Xám',
            'Tím Lilac',
            'Kem',
            'Be',
            'Titan',
            'Midnight',
            'Starlight',
            'Navy',
            'Mint',
        ] as $item) {
            AttributeValue::create([
                'attribute_id' => $color->id,
                'value' => $item,
            ]);
        }

        $ram = Attribute::create([
            'name' => 'RAM',
        ]);

        foreach (['4GB', '6GB', '8GB', '12GB', '16GB'] as $item) {
            AttributeValue::create([
                'attribute_id' => $ram->id,
                'value' => $item,
            ]);
        }

        $storage = Attribute::create([
            'name' => 'Bộ nhớ',
        ]);

        foreach (['64GB', '128GB', '256GB', '512GB', '1TB'] as $item) {
            AttributeValue::create([
                'attribute_id' => $storage->id,
                'value' => $item,
            ]);
        }
    }
}
