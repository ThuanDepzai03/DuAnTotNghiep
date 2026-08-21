<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            if (!Schema::hasColumn('banners', 'title_font_size')) {
                $table->unsignedTinyInteger('title_font_size')->default(37)->after('subtitle');
            }

            if (!Schema::hasColumn('banners', 'subtitle_font_size')) {
                $table->unsignedTinyInteger('subtitle_font_size')->default(16)->after('title_font_size');
            }
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn(['title_font_size', 'subtitle_font_size']);
        });
    }
};
