<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $categories = [
            ['slug' => 'phu-kien', 'name' => 'Phụ kiện', 'parent_slug' => null],
            ['slug' => 'tai-nghe', 'name' => 'Tai nghe', 'parent_slug' => 'phu-kien'],
            ['slug' => 'dong-ho', 'name' => 'Đồng hồ', 'parent_slug' => 'phu-kien'],
            ['slug' => 'op-lung', 'name' => 'Ốp lưng', 'parent_slug' => 'phu-kien'],
            ['slug' => 'bo-sac', 'name' => 'Bộ sạc', 'parent_slug' => 'phu-kien'],
            ['slug' => 'cu-sac', 'name' => 'Củ sạc', 'parent_slug' => 'bo-sac'],
            ['slug' => 'day-sac', 'name' => 'Dây sạc', 'parent_slug' => 'bo-sac'],
            ['slug' => 'kinh-cuong-luc', 'name' => 'Kính cường lực', 'parent_slug' => 'phu-kien'],
        ];

        foreach ($categories as $category) {
            if (! DB::table('categories')->where('slug', $category['slug'])->exists()) {
                DB::table('categories')->insert([
                    'slug' => $category['slug'],
                    'name' => $category['name'],
                    'status' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            DB::table('categories')->where('slug', $category['slug'])->update([
                'name' => $category['name'],
                'status' => 1,
                'updated_at' => $now,
            ]);
        }

        foreach ($categories as $category) {
            DB::table('categories')
                ->where('slug', $category['slug'])
                ->update([
                    'parent_id' => $category['parent_slug']
                        ? DB::table('categories')->where('slug', $category['parent_slug'])->value('id')
                        : null,
                    'updated_at' => $now,
                ]);
        }
    }

    public function down(): void
    {
        $accessoryId = DB::table('categories')->where('slug', 'phu-kien')->value('id');

        DB::table('categories')
            ->whereIn('slug', ['tai-nghe', 'dong-ho', 'op-lung', 'bo-sac', 'cu-sac', 'day-sac', 'kinh-cuong-luc'])
            ->whereNotExists(function ($query) use ($accessoryId) {
                $query->select(DB::raw(1))
                    ->from('products')
                    ->whereColumn('products.category_id', 'categories.id');
            })
            ->delete();

        if ($accessoryId) {
            DB::table('categories')->where('id', $accessoryId)->update(['parent_id' => null]);
        }
    }
};