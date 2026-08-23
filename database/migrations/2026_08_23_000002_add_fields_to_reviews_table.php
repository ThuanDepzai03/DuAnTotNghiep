<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('product_id')->after('id')->constrained('products')->cascadeOnDelete();
            $table->unsignedBigInteger('customer_id')->nullable()->after('product_id');
            $table->string('customer_name')->after('customer_id');
            $table->unsignedTinyInteger('rating')->after('customer_name');
            $table->text('comment')->after('rating');
            $table->string('status')->default('approved')->after('comment');
            $table->index(['product_id', 'customer_id']);
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropIndex(['product_id', 'customer_id']);
            $table->dropColumn([
                'product_id',
                'customer_id',
                'customer_name',
                'rating',
                'comment',
                'status',
            ]);
        });
    }
};
