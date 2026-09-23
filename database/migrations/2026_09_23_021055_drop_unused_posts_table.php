<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('posts');
    }

    public function down(): void
    {
        Schema::create('posts', function ($table) {
            $table->id();
            $table->timestamps();
        });
    }
};
