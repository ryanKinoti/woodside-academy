<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('personal_email');
            $table->string('password');
            $table->enum('gender',['Male','Female','Unknown']);
            $table->integer('phone_number');
            $table->string('profile_photo')->nullable();
            $table->string('current_residence_location');
            $table->string('parent_name');
            $table->string('parent_email');
            $table->integer('parent_phone_number');
            $table->timestamps();

            $table->foreign("course_id")->references("id")->on("courses");
        });

        DB::update("ALTER TABLE students AUTO_INCREMENT=60001; ");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
