<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->char('estado',2);
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->integer('numero');
            $table->integer('numero_quarto');
            $table->integer('numero_garagem');
            $table->integer('numero_suite');
            $table->decimal('area_construida');
            $table->decimal('valor_condominio');
            $table->decimal('valor_iptu');
            $table->string('anuncio_titulo');
            $table->text('anuncio_descricao');
            $table->decimal('preco');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('adverts_categories_id')->unsigned();
            $table->foreign('adverts_categories_id')->references('id')->on('adverts_categories');

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
        Schema::drop('adverts');
    }
}
