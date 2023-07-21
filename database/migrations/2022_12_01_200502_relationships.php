<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_users', function (Blueprint $table) {
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('country_id')->references('id')->on('countries');
        });

        Schema::table('user_streamers', function (Blueprint $table) {
            $table->foreign('app_user_id')->references('id')->on('app_users');
        });

        Schema::table('user_buying_tokens', function (Blueprint $table) {
            $table->foreign('app_user_id')->references('id')->on('app_users');
        });

        Schema::table('live_streams', function (Blueprint $table) {
            $table->foreign('user_streamer_id')->references('id')->on('user_streamers');
        });

        Schema::table('paying_live_streams', function (Blueprint $table) {
            $table->foreign('user_streamer_id')->references('id')->on('user_streamers');
            $table->foreign('app_user_id')->references('id')->on('app_users');
            $table->foreign('live_stream_id')->references('id')->on('live_streams');
        });

        Schema::table('user_streamer_categories', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_streamer_id')->references('id')->on('user_streamers');
        });

        Schema::table('live_stream_comments', function (Blueprint $table) {
            $table->foreign('user_streamer_id')->references('id')->on('user_streamers');
            $table->foreign('app_user_id')->references('id')->on('app_users');
            $table->foreign('live_stream_id')->references('id')->on('live_streams');
            $table->foreign('user_streamer_challenge_id')->references('id')->on('user_streamer_challenges');
        });

        Schema::table('user_streamer_challenges', function (Blueprint $table) {
            $table->foreign('user_streamer_id')->references('id')->on('user_streamers');
        });

        Schema::table('user_follows', function (Blueprint $table) {
            $table->foreign('user_streamer_id')->references('id')->on('user_streamers');
            $table->foreign('app_user_id')->references('id')->on('app_users');
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
}
