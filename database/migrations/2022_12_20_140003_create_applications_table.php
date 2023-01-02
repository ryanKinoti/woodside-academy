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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('gender');
            $table->enum('roles', ['student', 'lecturer', 'staff']);
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('course_id')->unsigned()->nullable();

            $table->timestamps();

            //relationships
            $table->foreign("faculty_id")->references("id")->on("faculties");
            $table->foreign("department_id")->references("id")->on("departments");
        });

        DB::update("ALTER TABLE applications AUTO_INCREMENT=701; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
