<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();

            // Mã voucher
            $table->string('code')->unique();

            // Tên voucher
            $table->string('name');

            // percent | fixed
            $table->enum('discount_type', ['percent', 'fixed']);

            // Giá trị giảm
            $table->decimal('discount_value', 12, 2);

            // Giảm tối đa (chỉ áp dụng nếu giảm theo %)
            $table->decimal('max_discount', 12, 2)->nullable();

            // Đơn tối thiểu
            $table->decimal('min_order', 12, 2)->default(0);

            // Số lượng voucher
            $table->integer('quantity');

            // Đã sử dụng
            $table->integer('used_quantity')->default(0);

            // Thời gian
            $table->date('start_date');
            $table->date('end_date');

            // Hoạt động hay không
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
