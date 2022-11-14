<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('administrators', function (Blueprint $table) {
            $table->id();
            $table->string('admin_first_name');
            $table->string('admin_second_name');
            $table->string('admin_last_name');
            $table->integer('admin_phone_number');
            $table->string('admin_personal_email');
            $table->string('admin_password');
            $table->enum('gender', ['Male', 'Female', 'Unknown']);
            $table->string('current_residence_location');
            $table->enum('role',['superAdmin','admin'])->default('superAdmin');
            $table->timestamps();
        });

        DB::update("ALTER TABLE administrators AUTO_INCREMENT=1001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrators');
    }
};
