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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->string('customer_name');

            $table->string('phone',20);

            $table->string('email')->nullable();

            $table->text('address');

            $table->text('note')->nullable();

            $table->decimal('total_price',12,2);

            $table->enum('payment_method',[
                'cod',
                'vnpay'
            ]);
            $table->enum('status',[
                'pending',
                'confirmed',
                'shipping',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
