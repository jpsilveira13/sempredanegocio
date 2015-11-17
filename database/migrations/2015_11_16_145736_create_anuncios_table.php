<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('anuncios')){
            Schema::create('anuncios', function (Blueprint $table) {
                $table->increments('id');
                $table->string('estado', 75);
                $table->string('cidade', 75);
                $table->string('bairro', 75);
                $table->string('rua', 75);
                $table->integer('numero');
                $table->integer('numero_quarto');
                $table->integer('numero_garagem');
                $table->integer('numero_suite');
                $table->decimal('area_construida', 10, 2);
                $table->decimal('valor_condominio', 10, 2);
                $table->decimal('valor_iptu', 10, 2);
                $table->string('anuncio_titulo');
                $table->string('anuncio_descricao');
                $table->decimal('preco', 10, 2);
               // $table->integer('anuncio_geral_id')->unsigned();
                //$table->foreign('anuncio_geral_id')->references('id')->on('anuncio_gerais')->onDelete('cascade');
               // $table->integer('user_id')->unsigned();
                ///$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anuncios');
    }
}
