<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idsocial')->unique()->nullable();
            $table->string('social')->default('normal');
            $table->string('avatar');
            $table->string('name');
            $table->string('tipo');
            $table->string('email')->unique()->nullable();
            $table->string('password', 60)->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->rememberToken();
            $table->timestamps();


        });

    }


    public function down()
    {
        Schema::drop('users');
    }
}
