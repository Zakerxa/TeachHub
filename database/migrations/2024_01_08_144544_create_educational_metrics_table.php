<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_metrics', function (Blueprint $table) {
            $table->id();
            $table->integer('learners')->default(100)->nullable();
            $table->integer('teachers')->default(100)->nullable();
            $table->integer('subjects')->default(100)->nullable();
            $table->integer('grades')->default(100)->nullable();
            $table->integer('extra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educational_metrics');
    }
}
