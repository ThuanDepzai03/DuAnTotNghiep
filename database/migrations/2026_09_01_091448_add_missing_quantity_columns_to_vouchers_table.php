<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {

            if (!Schema::hasColumn('vouchers', 'quantity')) {
                $table->integer('quantity')->default(0);
            }

            if (!Schema::hasColumn('vouchers', 'used_quantity')) {
                $table->integer('used_quantity')->default(0);
            }

        });
    }

    public function down(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {

            if (Schema::hasColumn('vouchers', 'used_quantity')) {
                $table->dropColumn('used_quantity');
            }

            if (Schema::hasColumn('vouchers', 'quantity')) {
                $table->dropColumn('quantity');
            }

        });
    }
};