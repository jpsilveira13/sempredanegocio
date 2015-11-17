<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnuncioGeraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('anuncio_gerais')) {
            Schema::create('anuncio_gerais', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nome');
                $table->integer('subcategoria_id')->unsigned();
                $table->foreign('subcategoria_id')->references('id')->on('anuncio_subcategorias');

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
        Schema::drop('anuncio_gerais');
    }
}
