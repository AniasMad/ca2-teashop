<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teashops', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); //unique name for each shop
            $table->string('address');
            $table->string('phone');
            $table->string('image')->default('cover.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teashops');
    }
};
