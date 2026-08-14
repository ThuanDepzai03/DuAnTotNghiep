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
                $table->text('address_detail')->nullable();
            }
            if (!Schema::hasColumn('orders', 'city')) {
                $table->string('city')->nullable();
            }
            if (!Schema::hasColumn('orders', 'ward')) {
                $table->string('ward')->nullable();
            }
            if (!Schema::hasColumn('orders', 'voucher_code')) {
                $table->string('voucher_code')->nullable();
            }
            if (!Schema::hasColumn('orders', 'discount_amount')) {
                $table->decimal('discount_amount', 12, 2)->default(0);
            }
            if (!Schema::hasColumn('orders', 'transaction_no')) {
                $table->string('transaction_no')->nullable();
            }
            if (!Schema::hasColumn('orders', 'bank_code')) {
                $table->string('bank_code')->nullable();
            }
            if (!Schema::hasColumn('orders', 'paid_at')) {
                $table->timestamp('paid_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumnIfExists('address_detail');
            $table->dropColumnIfExists('city');
            $table->dropColumnIfExists('ward');
            $table->dropColumnIfExists('voucher_code');
            $table->dropColumnIfExists('discount_amount');
            $table->dropColumnIfExists('transaction_no');
            $table->dropColumnIfExists('bank_code');
            $table->dropColumnIfExists('paid_at');
        });
    }
};
