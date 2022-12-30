<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->string('course_name');
            $table->string('course_years_duration');
            $table->integer('number_of_semesters');
            $table->enum('course_status', ['closed', 'open'])->default('closed');
            $table->timestamps();

            //relationships
            $table->foreign("faculty_id")->references("id")->on("faculties");
        });

        DB::update("ALTER TABLE courses AUTO_INCREMENT=70001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
