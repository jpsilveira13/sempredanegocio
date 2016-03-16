<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts_messsage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('adverts');
            $table->string('url_site');
            $table->string('nome_usuario');
            $table->string('email_usuario');
            $table->string('telefone_usuario');
            $table->string('nome');
            $table->string('email');
            $table->string('codigo_area');
            $table->string('telefone');
            $table->text('mensagem');
            $table->char('newsletter');
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
        Schema::drop('adverts_messsage');
    }
}
