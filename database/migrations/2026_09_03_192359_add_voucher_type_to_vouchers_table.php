<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('vouchers', 'voucher_type')) {
            Schema::table('vouchers', function (Blueprint $table) {
                $table->enum('voucher_type', [
                    'normal',
                    'flash_sale',
                    'mid_autumn'
                ])->default('normal')->after('name');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('vouchers', 'voucher_type')) {
            Schema::table('vouchers', function (Blueprint $table) {
                $table->dropColumn('voucher_type');
            });
        }
    }
};
