<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('extension');
            $table->integer('adverts_id')->unsigned();
            $table->foreign('advert_id')->references('id')->on('adverts');
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
        Schema::drop('advert_images');
    }
}
