<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('categoria');
            $table->tinyInteger('subcategoria');
            $table->tinyInteger('apartamento_type');
            $table->string('estado',75);
            $table->string('cidade',75);
            $table->string('bairro',75);
            $table->string('rua',75);
            $table->integer('numero');
            $table->string('tipo_moradia',75);
            $table->integer('numero_quarto');
            $table->integer('numero_garagem');
            $table->integer('numero_suite');
            $table->decimal('area_construida');
            $table->decimal('valor_condominio',8,2);
            $table->decimal('valor_iptu',8,2);
            $table->string('caracteristicas');
            $table->string('anuncio_titulo');
            $table->string('anuncio_descricao');
            $table->string('anuncio_image');
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

        Schema::drop('posts');

    }
}
