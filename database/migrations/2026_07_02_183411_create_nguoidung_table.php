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
    Schema::create('nguoidung', function (Blueprint $table) {
        $table->id();
        $table->string('user');
        $table->string('pass');
        $table->string('email');
        $table->string('address')->nullable();
        $table->string('tel')->nullable();
        $table->integer('role')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoidung');
    }
};
