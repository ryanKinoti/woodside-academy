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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('user_role', ['admin', 'student', 'lecturer','staff'])->default('admin');
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('firstName');
            $table->string('secondName');
            $table->string('lastName');
            $table->mediumInteger('id_number')->nullable();
            $table->string('phoneNumber');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('profile_photo')->nullable();
            $table->string('country');
            $table->string('city');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT=1001; ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
