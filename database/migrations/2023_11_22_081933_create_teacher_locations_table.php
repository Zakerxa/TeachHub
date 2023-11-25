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
        Schema::create('teacher_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained();
            $table->string('region_state');
            $table->string('region_state_mm')->nullable();
            $table->string('capital');
            $table->string('capital_mm')->nullable();
            $table->string('township');
            $table->string('township_mm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_locations');
    }
};
