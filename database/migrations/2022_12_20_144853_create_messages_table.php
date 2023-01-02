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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('from_user_id')->unsigned();
            $table->bigInteger('to_faculty_id')->unsigned()->nullable();
            $table->bigInteger('to_department_id')->unsigned()->nullable();
            $table->bigInteger('to_course_id')->unsigned()->nullable();
            $table->bigInteger('to_user_id')->unsigned()->nullable();
            $table->enum('intended_user_role', ['staff', 'lecturer', 'student'])->nullable();
            $table->enum('bulk_send', ['yes', 'no'])->default('no');
            $table->string('title');
            $table->string('message_content');
            $table->enum('message_status', ['read', 'unread', 'deleted'])->default('unread');
            $table->timestamps();

            //relationships
            $table->foreign('from_user_id')->references('id')->on('users');
            $table->foreign('to_user_id')->references('id')->on('users');
            $table->foreign('to_department_id')->references('id')->on('departments');
            $table->foreign('to_faculty_id')->references('id')->on('faculties');
        });

        DB::update("ALTER TABLE messages AUTO_INCREMENT=301; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_messaging');
    }
};
