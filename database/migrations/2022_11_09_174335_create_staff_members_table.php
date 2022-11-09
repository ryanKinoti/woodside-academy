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
        Schema::create('staff_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faculty_id')->unsigned();
            $table->string('staff_first_name');
            $table->string('staff_second_name');
            $table->string('staff_last_name');
            $table->integer('staff_phone_number');
            $table->string('staff_personal_email');
            $table->string('staff_password');
            $table->enum('gender', ['Male', 'Female', 'Unknown']);
            $table->string('current_residence_location');
            $table->timestamps();

            $table->foreign("faculty_id")->references("id")->on("faculties");
        });

        DB::update("ALTER TABLE staff_members AUTO_INCREMENT=90001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_members');
    }
};
