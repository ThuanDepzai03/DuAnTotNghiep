<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('nguoidung')) {
            return;
        }

        Schema::table('nguoidung', function (Blueprint $table) {
            if (!Schema::hasColumn('nguoidung', 'city')) {
                $table->string('city')->nullable()->after('address');
            }

            if (!Schema::hasColumn('nguoidung', 'ward')) {
                $table->string('ward')->nullable()->after('city');
            }

            if (!Schema::hasColumn('nguoidung', 'address_detail')) {
                $table->string('address_detail', 500)->nullable()->after('ward');
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('nguoidung')) {
            return;
        }

        Schema::table('nguoidung', function (Blueprint $table) {
            if (Schema::hasColumn('nguoidung', 'address_detail')) {
                $table->dropColumn('address_detail');
            }

            if (Schema::hasColumn('nguoidung', 'ward')) {
                $table->dropColumn('ward');
            }

            if (Schema::hasColumn('nguoidung', 'city')) {
                $table->dropColumn('city');
            }
        });
    }
};
