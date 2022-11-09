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
        Schema::create('lecturers_unit_registration', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('lecturer_id')->unsigned();
            $table->timestamps();

            $table->foreign("unit_id")->references("id")->on("units");
            $table->foreign("lecturer_id")->references("id")->on("lecturers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers_unit_registration');
    }
};
