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
        Schema::create('student_unit_registrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->timestamps();

            $table->foreign("unit_id")->references("id")->on("units");
            $table->foreign("student_id")->references("id")->on("students");
        });

        DB::update("ALTER TABLE student_unit_registrations AUTO_INCREMENT=70001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_unit_registrations');
    }
};
