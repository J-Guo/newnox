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
            $table->integer('offer_maker')->unsigned();
            $table->integer('posted_task_id')->unsigned();
            $table->integer('price');
            $table->date('date');
            $table->string('place');
            $table->string('status');
            $table->timestamps();
            $table->foreign('offer_maker')
                  ->references('id')->on('users');
            $table->foreign('posted_task_id')
                  ->references('id')->on('posted_tasks');
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
