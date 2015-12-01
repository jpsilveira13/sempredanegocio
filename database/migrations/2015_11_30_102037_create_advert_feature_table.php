<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_feature', function (Blueprint $table) {
            $table->integer('advert_id')->unsigned();
            $table->foreign('advert_id')->references('id')->on('adverts');
            $table->integer('feature_id')->unsigned();
            $table->foreign('feature_id')->references('id')->on('features');
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
        Schema::drop('advert_feature');
    }
}
