<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->integer('gender_id')->unsigned()->index();
            $table->integer('role_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->string('tokens_available');
            $table->boolean('last_view');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->dateTime('last_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_users');
    }
}
