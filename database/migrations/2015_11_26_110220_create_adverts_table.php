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
            $table->string('tipo_anuncio');
            $table->char('estado',2);
            $table->integer('status')->default(1);
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
            $table->string('url_anuncio');
            $table->tinyInteger('active');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('subcategories_id')->unsigned();
            $table->foreign('subcategories_id')->references('id')->on('subcategories');

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
