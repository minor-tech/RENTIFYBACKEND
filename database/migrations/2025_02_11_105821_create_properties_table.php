<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('price');
            $table->string('location');
            $table->integer('beds');
            $table->integer('baths');
            $table->string('area');
            $table->boolean('isVerified')->default(false);
            $table->boolean('isSuperAgent')->default(false);
            $table->integer('listedDays');
            $table->boolean('isFavorite')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
