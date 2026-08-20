<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'address_detail')) {
                $table->string('address_detail')->nullable()->after('address');
            }

            if (!Schema::hasColumn('orders', 'city')) {
                $table->string('city')->nullable()->after('address_detail');
            }

            if (!Schema::hasColumn('orders', 'ward')) {
                $table->string('ward')->nullable()->after('city');
            }

            if (!Schema::hasColumn('orders', 'voucher_code')) {
                $table->string('voucher_code')->nullable()->after('ward');
            }

            if (!Schema::hasColumn('orders', 'discount_amount')) {
                $table->decimal('discount_amount', 12, 2)->default(0)->after('voucher_code');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['address_detail', 'city', 'ward', 'voucher_code', 'discount_amount']);
        });
    }
};
