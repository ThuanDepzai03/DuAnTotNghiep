<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach ([
            'danhmuc' => 'legacy_categories',
            'hoadon' => 'legacy_orders',
            'chitiethoadon' => 'legacy_order_items',
            'sanpham' => 'legacy_products',
        ] as $oldName => $newName) {
            if (Schema::hasTable($oldName) && ! Schema::hasTable($newName)) {
                Schema::rename($oldName, $newName);
            }
        }
    }

    public function down(): void
    {
        foreach ([
            'legacy_categories' => 'danhmuc',
            'legacy_orders' => 'hoadon',
            'legacy_order_items' => 'chitiethoadon',
            'legacy_products' => 'sanpham',
        ] as $oldName => $newName) {
            if (Schema::hasTable($oldName) && ! Schema::hasTable($newName)) {
                Schema::rename($oldName, $newName);
            }
        }
    }
};