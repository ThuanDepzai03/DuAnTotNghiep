<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('product_attributes', 'show_on_product')) {
            Schema::table('product_attributes', function (Blueprint $table): void {
                $table->boolean('show_on_product')->default(true)->after('is_required');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('product_attributes', 'show_on_product')) {
            Schema::table('product_attributes', function (Blueprint $table): void {
                $table->dropColumn('show_on_product');
            });
        }
    }
};