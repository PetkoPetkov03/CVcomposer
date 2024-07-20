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
        Schema::create('techs', function (Blueprint $table) {
            $table->id();
            $table->longText('tech_name');
            $table->foreignId('cv_id')->nullable()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('cv_technology', function (Blueprint $table) {
            $table->id();
            $table->foreignId('c_v_id')->constrained('c_v_s')->onDelete('cascade');
            $table->foreignId('tech_id')->constrained('techs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('techs');
    }
};
