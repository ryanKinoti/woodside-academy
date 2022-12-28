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
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('from_user_id')->unsigned();
            $table->bigInteger('to_class_id')->unsigned()->nullable();
            $table->bigInteger('to_user_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('message_content');
            $table->enum('message_status', ['read', 'unread'])->default('unread');
            $table->timestamps();

            $table->foreign('from_user_id')->references('id')->on('users');
            $table->foreign('to_user_id')->references('id')->on('users');
        });

        DB::update("ALTER TABLE user_messages AUTO_INCREMENT=60001; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_messaging');
    }
};
