<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_imeis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_variant_id')->constrained('product_variants')->cascadeOnDelete();
            $table->string('imei', 30)->unique();
            $table->string('imei2', 30)->nullable()->unique();
            $table->enum('status', ['in_stock', 'reserved', 'sold', 'returned', 'warranty', 'retired'])->default('in_stock');
            $table->string('warehouse_location')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->timestamp('sold_at')->nullable();
            $table->timestamp('warranty_expired_at')->nullable();
            $table->timestamps();
            $table->index(['product_variant_id', 'status']);
        });

        Schema::create('order_item_imeis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->constrained('order_items')->cascadeOnDelete();
            $table->foreignId('product_imei_id')->constrained('product_imeis')->restrictOnDelete();
            $table->unique(['order_item_id', 'product_imei_id']);
            $table->timestamps();
        });

        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_variant_id')->constrained('product_variants')->cascadeOnDelete();
            $table->foreignId('product_imei_id')->nullable()->constrained('product_imeis')->nullOnDelete();
            $table->foreignId('order_id')->nullable()->constrained('orders')->nullOnDelete();
            $table->string('type', 30);
            $table->integer('quantity');
            $table->text('note')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->index(['product_variant_id', 'type']);
        });

        Schema::create('return_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status', ['pending', 'approved', 'rejected', 'received', 'refunded', 'completed'])->default('pending');
            $table->string('reason');
            $table->text('description')->nullable();
            $table->decimal('refund_amount', 12, 2)->default(0);
            $table->string('refund_method')->nullable();
            $table->text('admin_note')->nullable();
            $table->timestamps();
            $table->index(['order_id', 'status']);
        });

        Schema::create('return_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('return_request_id')->constrained('return_requests')->cascadeOnDelete();
            $table->foreignId('order_item_id')->constrained('order_items')->cascadeOnDelete();
            $table->foreignId('product_imei_id')->nullable()->constrained('product_imeis')->nullOnDelete();
            $table->integer('quantity')->default(1);
            $table->string('condition')->nullable();
            $table->text('inspection_note')->nullable();
            $table->timestamps();
        });

        Schema::create('warranty_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_imei_id')->constrained('product_imeis')->restrictOnDelete();
            $table->foreignId('order_id')->nullable()->constrained('orders')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status', ['submitted', 'received', 'checking', 'repairing', 'ready', 'returned', 'rejected'])->default('submitted');
            $table->text('issue_description');
            $table->text('technician_note')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->index(['product_imei_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warranty_claims');
        Schema::dropIfExists('return_items');
        Schema::dropIfExists('return_requests');
        Schema::dropIfExists('inventory_transactions');
        Schema::dropIfExists('order_item_imeis');
        Schema::dropIfExists('product_imeis');
    }
};