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
            if (!Schema::hasColumn('orders', 'refund_status')) {
                $table->string('refund_status')->nullable()->default(null)->after('status');
            }
            if (!Schema::hasColumn('orders', 'refund_reason')) {
                $table->text('refund_reason')->nullable()->after('refund_status');
            }
            if (!Schema::hasColumn('orders', 'refund_requested_at')) {
                $table->timestamp('refund_requested_at')->nullable()->after('refund_reason');
            }
            if (!Schema::hasColumn('orders', 'refund_processed_at')) {
                $table->timestamp('refund_processed_at')->nullable()->after('refund_requested_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumnIfExists('refund_status');
            $table->dropColumnIfExists('refund_reason');
            $table->dropColumnIfExists('refund_requested_at');
            $table->dropColumnIfExists('refund_processed_at');
        });
    }
};
