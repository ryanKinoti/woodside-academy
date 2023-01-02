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
        //schema to update the users table
        Schema::table('users', function (Blueprint $table) {

            //relationships
            $table->foreign("faculty_id")->references("id")->on("faculties");
            $table->foreign("course_id")->references("id")->on("courses");
            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('application_id')->references('id')->on('applications');
        });

        //schema to update the applications table
        Schema::table('applications', function (Blueprint $table) {

            //relationships
            $table->foreign("course_id")->references("id")->on("courses");
        });

        //schema to update the messages table
        Schema::table('messages', function (Blueprint $table) {

            //relationships
            $table->foreign('to_course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
