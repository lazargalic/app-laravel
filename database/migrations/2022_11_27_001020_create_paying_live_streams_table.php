<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayingLiveStreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paying_live_streams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_user_id')->unsigned()->index();
            $table->integer('user_streamer_id')->unsigned()->index();
            $table->integer('live_stream_id')->unsigned()->index();
            $table->dateTime('payed_at');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paying_live_streams');
    }
}
