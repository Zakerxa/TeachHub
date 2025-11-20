<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id')->default(1)->nullable(); // Add 'user_id' column after 'id'
            $table->foreign('user_id')->references('id')->on('users'); // Remove onDelete('cascade')
            $table->string('status')->after('rating')->nullable()->default(1);
            $table->string('certificate')->after('rating')->nullable();
            $table->string('special')->after('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('status');
            $table->dropColumn('certificate');
            $table->dropColumn('special');
        });
    }
}
