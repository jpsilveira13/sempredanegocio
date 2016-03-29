<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->increments('id');
            $table->string('plan_name', 50);
            $table->double('plan_value', 10, 2);
            $table->double('liquide_value', 10, 2);
            $table->integer('plan_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('transaction_id');
            $table->tinyInteger('confirmed')->default(0);
            $table->tinyInteger('status_code')->default(0);
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

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
        Schema::drop('payments');
    }
}
