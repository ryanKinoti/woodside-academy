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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('comm_id')->unsigned();
            $table->bigInteger('sent_user_id')->unsigned();
            $table->string('title');
            $table->string('content');
            $table->timestamps();

            $table->foreign('comm_id')->references('id')->on('communications');
            $table->foreign('sent_user_id')->references('id')->on('users');
        });

        DB::update("ALTER TABLE messages AUTO_INCREMENT=50001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
