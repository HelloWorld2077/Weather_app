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
        Schema::create('current', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('state_or_province')->nullable();
            $table->string('country')->nullable();
            $table->float('temperature')->nullable();
            $table->float('feels_like')->nullable();
            $table->float('wind_kph')->nullable();
            $table->integer('chance_of_rain')->nullable();
            $table->integer('chance_of_snow')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('current');
    }
};
