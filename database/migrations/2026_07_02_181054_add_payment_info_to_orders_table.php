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
        $table->string('transaction_no')->nullable()->after('status');
        $table->string('bank_code')->nullable()->after('transaction_no');
        $table->timestamp('paid_at')->nullable()->after('bank_code');
    });
}

public function down(): void
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn(['transaction_no', 'bank_code', 'paid_at']);
    });
}
};
