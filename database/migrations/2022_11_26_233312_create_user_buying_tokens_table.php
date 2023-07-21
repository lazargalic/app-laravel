<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBuyingTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_buying_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_user_id')->unsigned()->index();
            $table->string('bought_tokens');
            $table->dateTime('bought_at');
            $table->boolean('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_buying_tokens');
    }
}
