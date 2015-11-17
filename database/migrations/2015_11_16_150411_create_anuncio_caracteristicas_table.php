<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnuncioCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio_caracteristicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caracteristicas');
            $table->integer('anuncio_id')->unsigned()->nullabe();
            $table->foreign('anuncio_id')->references('id')->on('anuncios')->onDelete('cascade');
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
        Schema::drop('anuncio_caracteristicas');
    }
}
