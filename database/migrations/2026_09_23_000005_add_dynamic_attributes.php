<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->enum('input_type', ['select', 'text', 'number', 'boolean'])->default('select')->after('name');
            $table->boolean('is_active')->default(true)->after('input_type');
            $table->unsignedInteger('sort_order')->default(0)->after('is_active');
        });

        Schema::create('category_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('attribute_id')->constrained('attributes')->cascadeOnDelete();
            $table->boolean('is_required')->default(false);
            $table->timestamps();
            $table->unique(['category_id', 'attribute_id']);
        });

        Schema::table('variant_attribute_values', function (Blueprint $table) {
            $table->foreignId('attribute_id')->nullable()->after('product_variant_id')->constrained('attributes')->cascadeOnDelete();
            $table->text('custom_value')->nullable()->after('attribute_value_id');
        });
    }

    public function down(): void
    {
        Schema::table('variant_attribute_values', function (Blueprint $table) {
            $table->dropForeign(['attribute_id']);
            $table->dropColumn(['attribute_id', 'custom_value']);
        });
        Schema::dropIfExists('category_attributes');
        Schema::table('attributes', function (Blueprint $table) {
            $table->dropColumn(['input_type', 'is_active', 'sort_order']);
        });
    }
};
