<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('nguoidung') && ! Schema::hasColumn('nguoidung', 'google_id')) {
            Schema::table('nguoidung', function (Blueprint $table) {
                $table->string('google_id')->nullable()->unique()->after('email');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('nguoidung', 'google_id')) {
            Schema::table('nguoidung', function (Blueprint $table) {
                $table->dropUnique(['google_id']);
                $table->dropColumn('google_id');
            });
        }
    }
};