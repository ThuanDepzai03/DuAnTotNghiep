<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $customerTable = Schema::hasTable('users') ? 'users' : (Schema::hasTable('nguoidung') ? 'nguoidung' : null);

        if ($customerTable) {
            Schema::table($customerTable, function (Blueprint $table) use ($customerTable) {
                if (! Schema::hasColumn($customerTable, 'gender')) {
                    $table->string('gender', 20)->nullable();
                }
                if (! Schema::hasColumn($customerTable, 'birth_date')) {
                    $table->date('birth_date')->nullable();
                }
                if (! Schema::hasColumn($customerTable, 'avatar_path')) {
                    $table->string('avatar_path')->nullable();
                }
                if (! Schema::hasColumn($customerTable, 'preferences')) {
                    $table->json('preferences')->nullable();
                }
                if (! Schema::hasColumn($customerTable, 'session_version')) {
                    $table->unsignedInteger('session_version')->default(1);
                }
            });
        }

        if (! Schema::hasTable('customer_addresses')) {
            Schema::create('customer_addresses', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->index();
                $table->string('recipient_name', 255);
                $table->string('phone', 20);
                $table->string('label', 20);
                $table->string('city', 255);
                $table->string('ward', 255);
                $table->string('address_detail', 500);
                $table->boolean('is_default')->default(false);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');

        $customerTable = Schema::hasTable('users') ? 'users' : (Schema::hasTable('nguoidung') ? 'nguoidung' : null);
        if (! $customerTable) {
            return;
        }

        Schema::table($customerTable, function (Blueprint $table) use ($customerTable) {
            $columns = ['gender', 'birth_date', 'avatar_path', 'preferences', 'session_version'];
            foreach ($columns as $column) {
                if (Schema::hasColumn($customerTable, $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
