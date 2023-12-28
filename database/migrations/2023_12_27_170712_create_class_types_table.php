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
        Schema::create('class_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained();
            $table->string('class_type'); // Add this column for class type (inperson, group, homeguide, onebyone)
            $table->string('day')->nullable(); // Add this column for the day (Mon, Tue, etc.)
            $table->string('time')->nullable(); // Add this column for the time (8:00 - 9:00 pm)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_types');
    }
};
