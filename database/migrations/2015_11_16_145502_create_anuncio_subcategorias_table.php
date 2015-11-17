<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnuncioSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('anuncio_subcategorias')) {
            Schema::create('anuncio_subcategorias', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nome', 100);

                $table->integer('categorias_id')->unsigned();
                $table->foreign('categorias_id')->references('id')->on('anuncio_categorias')->onDelete('cascade');
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
        Schema::drop('anuncio_subcategorias');
    }
}
