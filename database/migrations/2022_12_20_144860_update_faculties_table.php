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
        //
        Schema::table('faculties', function (Blueprint $table) {

            $table->bigInteger('examination_id')->unsigned()->nullable();
            $table->bigInteger('communications_id')->unsigned()->nullable();
            $table->timestamps();

            //relationships
            $table->foreign('examination_id')->references('id')->on('examinations');
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
