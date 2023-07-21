<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveStreamCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_stream_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_user_id')->unsigned()->index();
            $table->integer('user_streamer_id')->unsigned()->index();
            $table->integer('live_stream_id')->unsigned()->index();
            $table->integer('user_streamer_challenge_id')->unsigned()->index()->nullable();
            $table->string('tokens')->nullable();
            $table->string('comment');
            $table->dateTime('commented_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_stream_comments');
    }
}
