<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStreamerChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_streamer_challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_streamer_id')->unsigned()->index();
            $table->string('name_challenge')->unique();      ///////////////////////
            $table->string('price');
            $table->dateTime('created_at');
            $table->dateTime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_streamer_challenges');
    }
}
