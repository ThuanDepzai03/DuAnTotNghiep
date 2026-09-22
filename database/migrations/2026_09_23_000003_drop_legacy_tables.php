<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('legacy_order_items');
        Schema::dropIfExists('legacy_orders');
        Schema::dropIfExists('legacy_products');
        Schema::dropIfExists('legacy_categories');
    }

    public function down(): void
    {
        // Legacy tables are intentionally not recreated.
    }
};