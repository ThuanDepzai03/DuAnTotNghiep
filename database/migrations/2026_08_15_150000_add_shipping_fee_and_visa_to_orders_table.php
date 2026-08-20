<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'shipping_fee')) {
                $table->decimal('shipping_fee', 12, 2)->default(0)->after('discount_amount');
            }
        });

        DB::statement("ALTER TABLE orders MODIFY payment_method ENUM('cod', 'vnpay') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'shipping_fee')) {
                $table->dropColumn('shipping_fee');
            }
        });

        DB::statement("ALTER TABLE orders MODIFY payment_method ENUM('cod', 'vnpay') NOT NULL");
    }
};
