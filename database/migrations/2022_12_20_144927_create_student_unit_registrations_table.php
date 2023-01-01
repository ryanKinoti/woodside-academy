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
        Schema::create('student_unit_registrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->enum('status', ['passed', 'awaiting exam', 'failed'])->default('awaiting exam');
            $table->timestamps();

            //relationships
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('student_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_registrations');
    }
};
