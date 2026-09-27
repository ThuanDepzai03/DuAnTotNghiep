<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('nguoidung') && ! Schema::hasTable('users')) {
            Schema::rename('nguoidung', 'users');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('users') && ! Schema::hasTable('nguoidung')) {
            Schema::rename('users', 'nguoidung');
        }
    }
};