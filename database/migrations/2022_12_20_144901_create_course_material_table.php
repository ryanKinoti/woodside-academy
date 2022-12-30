<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_material', function (Blueprint $table) {
            $table->id();
            $table->enum('course_year', ['1', '2', '3', '4']);
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('lecturer_id')->unsigned();
            $table->string('file');
            $table->string('file_name');
            $table->string('file_type');
            $table->timestamps();

            //relationships
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('lecturer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_material');
    }
};
