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
            if (!Schema::hasColumn('nguoidung', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable();
            }

            if (!Schema::hasColumn('nguoidung', 'email_verification_token')) {
                $table->string('email_verification_token', 128)->nullable();
            }

            if (!Schema::hasColumn('nguoidung', 'email_verification_expires_at')) {
                $table->timestamp('email_verification_expires_at')->nullable();
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('nguoidung')) {
            return;
        }

        Schema::table('nguoidung', function (Blueprint $table) {
            foreach ([
                'email_verified_at',
                'email_verification_token',
                'email_verification_expires_at',
            ] as $column) {
                if (Schema::hasColumn('nguoidung', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
