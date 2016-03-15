<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesFriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_friend', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('url_site',255);
            $table->string('nome_amigo',150);
            $table->string('email_amigo',200);
            $table->string('nome_anuncio',150);
            $table->string('email_anuncio',150);
            $table->text('assunto_anuncio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages_friend');
    }
}
