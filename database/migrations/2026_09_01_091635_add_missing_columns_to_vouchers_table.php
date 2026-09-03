<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {

            if (!Schema::hasColumn('vouchers', 'code')) {
                $table->string('code')->unique();
            }

            if (!Schema::hasColumn('vouchers', 'discount_type')) {
                $table->enum('discount_type', [
                    'percent',
                    'fixed',
                    'free_shipping'
                ])->default('percent');
            }

            if (!Schema::hasColumn('vouchers', 'discount_value')) {
                $table->decimal('discount_value', 12, 2)->default(0);
            }

            if (!Schema::hasColumn('vouchers', 'max_discount')) {
                $table->decimal('max_discount', 12, 2)->nullable();
            }

            if (!Schema::hasColumn('vouchers', 'min_order')) {
                $table->decimal('min_order', 12, 2)->default(0);
            }

            if (!Schema::hasColumn('vouchers', 'start_date')) {
                $table->date('start_date')->nullable();
            }

            if (!Schema::hasColumn('vouchers', 'end_date')) {
                $table->date('end_date')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropColumn([
                'code',
                'discount_type',
                'discount_value',
                'max_discount',
                'min_order',
                'start_date',
                'end_date',
            ]);
        });
    }
};