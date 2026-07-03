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

    if (!Schema::hasColumn('nguoidung', 'email')) {
        Schema::table('nguoidung', function (Blueprint $table) {
            $table->string('email')->nullable()->unique()->after('user');
        });
    }

    if (!Schema::hasColumn('nguoidung', 'address')) {
        Schema::table('nguoidung', function (Blueprint $table) {
            $table->string('address', 500)->nullable()->after('email');
        });
    }

    if (!Schema::hasColumn('nguoidung', 'tel')) {
        Schema::table('nguoidung', function (Blueprint $table) {
            $table->string('tel', 20)->nullable()->after('address');
        });
    }
}

    public function down(): void
    {
        if (Schema::hasColumn('nguoidung', 'tel')) {
            Schema::table('nguoidung', function (Blueprint $table) {
                $table->dropColumn('tel');
            });
        }

        if (Schema::hasColumn('nguoidung', 'address')) {
            Schema::table('nguoidung', function (Blueprint $table) {
                $table->dropColumn('address');
            });
        }

        if (Schema::hasColumn('nguoidung', 'email')) {
            Schema::table('nguoidung', function (Blueprint $table) {
                $table->dropUnique(['email']);
                $table->dropColumn('email');
            });
        }
    }
};
