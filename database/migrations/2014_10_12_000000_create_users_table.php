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
            $table->string('social')->default('Site');
            $table->integer('status')->default(1);
            $table->string('avatar');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password', 60)->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->integer('typeuser_id')->unsigned();
            $table->foreign('typeuser_id')->references('id')->on('types_user');
            $table->rememberToken();
            $table->timestamps();


        });

    }


    public function down()
    {
        Schema::drop('users');
    }
}
