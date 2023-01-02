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
        Schema::create('lecturer_unit_registrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('lecturer_id')->unsigned()->nullable();
            $table->enum('teaching_status', ['ongoing', 'completed', 'cancelled'])->default('ongoing');
            $table->timestamps();

            //relationships
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('lecturer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer_unit_registration');
    }
};
