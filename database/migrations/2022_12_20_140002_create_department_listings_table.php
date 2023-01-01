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
        Schema::create('department_listings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faculty_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->timestamps();

            //relationships
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_listings');
    }
};
