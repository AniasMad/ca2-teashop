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
        Schema::create('shop_teas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teashop_id');
            $table->unsignedBigInteger('tea_id');            
            $table->timestamps();

            $table->foreign('teashop_id')->references('id')->on('teashops')->onDelete('cascade');
            $table->foreign('tea_id')->references('id')->on('teas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_teas');
    }
};
