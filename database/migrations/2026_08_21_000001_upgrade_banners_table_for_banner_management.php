<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            if (!Schema::hasColumn('banners', 'subtitle')) {
                $table->string('subtitle')
                    ->nullable()
                    ->after('title');
            }

            if (!Schema::hasColumn('banners', 'type')) {
                $table->string('type')
                    ->default('hero')
                    ->after('link');
            }

            if (!Schema::hasColumn('banners', 'title_font_size')) {
                $table->unsignedTinyInteger('title_font_size')
                    ->default(37)
                    ->after('subtitle');
            }

            if (!Schema::hasColumn('banners', 'subtitle_font_size')) {
                $table->unsignedTinyInteger('subtitle_font_size')
                    ->default(16)
                    ->after('title_font_size');
            }
        });

        Schema::table('banners', function (Blueprint $table) {
            $table->integer('position')
                ->default(0)
                ->change();

            $table->boolean('status')
                ->default(true)
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            if (Schema::hasColumn('banners', 'subtitle')) {
                $table->dropColumn('subtitle');
            }

            if (Schema::hasColumn('banners', 'title_font_size')) {
                $table->dropColumn('title_font_size');
            }

            if (Schema::hasColumn('banners', 'subtitle_font_size')) {
                $table->dropColumn('subtitle_font_size');
            }

            if (Schema::hasColumn('banners', 'type')) {
                $table->dropColumn('type');
            }
        });

        Schema::table('banners', function (Blueprint $table) {
            $table->string('position')
                ->default('home')
                ->change();

            $table->tinyInteger('status')
                ->default(1)
                ->change();
        });
    }
};
