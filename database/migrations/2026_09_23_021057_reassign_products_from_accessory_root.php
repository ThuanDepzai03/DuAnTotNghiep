<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $accessoryId = DB::table('categories')
            ->where('slug', 'phu-kien')
            ->value('id');
        $phoneId = DB::table('categories')
            ->where('slug', 'dien-thoai')
            ->value('id');

        if ($accessoryId && $phoneId) {
            DB::table('products')
                ->where('category_id', $accessoryId)
                ->update([
                    'category_id' => $phoneId,
                    'updated_at' => now(),
                ]);
        }
    }

    public function down(): void
    {
    }
};
