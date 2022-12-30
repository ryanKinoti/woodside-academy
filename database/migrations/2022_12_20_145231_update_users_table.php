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
        //
        Schema::table('users', function (Blueprint $table) {

            //relationships
            $table->foreign("faculty_id")->references("id")->on("faculties");
            $table->foreign("course_id")->references("id")->on("courses");
            $table->foreign('admin_message_id')->references('id')->on('admin_messages');
            $table->foreign('user_message_id')->references('id')->on('user_messages');
            $table->foreign('unit_id')->references('id')->on('units');
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
