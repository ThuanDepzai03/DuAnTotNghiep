<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $tabletId = DB::table('categories')
            ->where('slug', 'may-tinh-bang')
            ->value('id');

        if ($tabletId) {
            DB::table('products')
                ->where('category_id', DB::table('categories')->where('slug', 'dong-ho')->value('id'))
                ->where(function ($query) {
                    $query->where('name', 'like', '%iPad%')
                        ->orWhere('name', 'like', '%Tab%');
                })
                ->update([
                    'category_id' => $tabletId,
                    'updated_at' => now(),
                ]);
        }
    }

    public function down(): void
    {
    }
};
