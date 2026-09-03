<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {

            if (!Schema::hasColumn('vouchers', 'name')) {
                $table->string('name')->default('');
            }

            if (!Schema::hasColumn('vouchers', 'status')) {
                $table->boolean('status')->default(true);
            }

        });
    }

    public function down(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {

            if (Schema::hasColumn('vouchers', 'status')) {
                $table->dropColumn('status');
            }

            if (Schema::hasColumn('vouchers', 'name')) {
                $table->dropColumn('name');
            }

        });
    }
};