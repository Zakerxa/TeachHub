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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('pic')->default('teacher.png');
            $table->string('experience');
            $table->string('time');
            $table->boolean('online_or_local')->default(1);
            $table->string('location')->nullable();
            $table->text('experience_description');
            $table->string('international_or_government');
            $table->string('time_mm')->nullable();
            $table->string('location_mm')->nullable();
            $table->text('experience_description_mm')->nullable();
            $table->string('international_or_government_mm')->nullable();
            $table->string('blank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
