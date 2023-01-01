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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->string('unit_name');
            $table->enum('unit_year', ['1', '2', '3', '4']);
            $table->enum('unit_semester', ['first', 'second']);
            $table->enum('unit_status', ['closed', 'available'])->default('closed');
            $table->timestamps();

            //relationships
            $table->foreign("course_id")->references("id")->on("courses");
        });

        DB::update("ALTER TABLE units AUTO_INCREMENT=601; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
};
