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
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faculty_id')->nullable();
            $table->string('faculty_message_id')->nullable();

            $table->bigInteger('department_id')->nullable();
            $table->string('department_message_id')->nullable();

            $table->bigInteger('course_id')->nullable();
            $table->string('course_message_id')->nullable();

            $table->bigInteger('user_id')->nullable();
            $table->string('user_message_id')->nullable();
            $table->timestamps();
        });

        DB::update("ALTER TABLE communications AUTO_INCREMENT=40001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communications');
    }
};
