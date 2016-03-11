<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskAndOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_offer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->integer('offer_id');
            $table->string('status');
            $table->timestamps();
            $table->foreign('task_id')
                  ->references('id')->on('posted_tasks');
            $table->foreign('offer_id')
                  ->references('id')->on('sent_offers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('task_offer');
    }
}
