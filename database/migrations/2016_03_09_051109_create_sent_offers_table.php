<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offer_maker');
            $table->integer('price');
            $table->date('date');
            $table->string('place');
            $table->string('status');
            $table->timestamps();
            $table->foreign('offer_maker')
                  ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sent_offers');
    }
}
