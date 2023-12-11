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
            $table->string('name_mm')->nullable();
            $table->integer('age');
            $table->string('pic')->default('hero.png');
            $table->string('experience');
            $table->string('time_table_1')->nullable();
            $table->string('time_table_2')->nullable();
            $table->integer('online_or_local')->default(0);
            $table->text('description');
            $table->boolean('environment')->default(0);
            $table->boolean('environment_mm')->default(0);
            $table->text('description_mm')->nullable();
            $table->string('time_table_1_mm')->nullable();
            $table->string('time_table_2_mm')->nullable();
            $table->string('token')->unique()->nullable();;
            $table->integer('order')->unique()->nullable();
            $table->string('rating')->default(0);
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
