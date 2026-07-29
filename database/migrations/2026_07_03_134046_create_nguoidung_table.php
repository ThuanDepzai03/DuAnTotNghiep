<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Máy hiện tại đã có bảng thì bỏ qua, tránh lỗi "table already exists"
        if (Schema::hasTable('nguoidung')) {
            return;
        }

        Schema::create('nguoidung', function (Blueprint $table) {
            $table->id();

            $table->string('user')->unique();
            $table->string('email')->nullable()->unique();
            $table->string('address', 500)->nullable();
            $table->string('tel', 20)->nullable();

            $table->string('pass');

            // 0 = khách hàng, 1 = admin
            $table->integer('role')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nguoidung');
    }
};
