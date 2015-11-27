<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features_adverts', function (Blueprint $table) {
            $table->integer('adverts_id');
            $table->foreign('adverts_id')->references('id')->on('adverts');
            $table->integer('features_id');
            $table->foreign('features_id')->references('id')->on('features');


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
        Schema::drop('features_adverts');
    }
}
