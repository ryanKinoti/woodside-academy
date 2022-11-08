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
        Schema::create('woodside_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('roles', ['superadmin', 'admin', 'student', 'lecturer'])->default('student');
            $table->string('profile_photo');
            $table->timestamps();
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT=20220001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('woodside_users');
    }
};
