<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('nguoidung') && !Schema::hasColumn('nguoidung', 'district')) {
            Schema::table('nguoidung', function (Blueprint $table) {
                $table->string('district')->nullable()->after('city');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('nguoidung') && Schema::hasColumn('nguoidung', 'district')) {
            Schema::table('nguoidung', function (Blueprint $table) {
                $table->dropColumn('district');
            });
        }
    }
};
