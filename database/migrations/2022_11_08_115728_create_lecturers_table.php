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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->string('lec_first_name');
            $table->string('lec_second_name');
            $table->string('lec_last_name');
            $table->string('lec_personal_email');
            $table->string('lec_password');
            $table->enum('gender', ['Male', 'Female', 'Unknown']);
            $table->integer('lec_phone_number');
            $table->string('current_residence_location');
            $table->timestamps();

            $table->foreign("course_id")->references("id")->on("courses");
        });

        DB::update("ALTER TABLE lecturers AUTO_INCREMENT=50001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
};
