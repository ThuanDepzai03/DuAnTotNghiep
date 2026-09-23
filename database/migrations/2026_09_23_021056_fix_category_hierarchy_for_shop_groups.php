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

        if ($accessoryId) {
            DB::table('categories')
                ->where('slug', 'bo-sac')
                ->update([
                    'parent_id' => $accessoryId,
                    'updated_at' => now(),
                ]);
        }
    }

    public function down(): void
    {
        $phoneId = DB::table('categories')
            ->where('slug', 'dien-thoai')
            ->value('id');

        if ($phoneId) {
            DB::table('categories')
                ->where('slug', 'bo-sac')
                ->update([
                    'parent_id' => $phoneId,
                    'updated_at' => now(),
                ]);
        }
    }
};
