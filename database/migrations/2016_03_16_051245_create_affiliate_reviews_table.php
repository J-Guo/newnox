<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reviewer')->unsigned();
            $table->integer('reviewee')->unsigned();
            $table->integer('sent_offer_id')->unsigned();
            $table->integer('rate');
            $table->string('comment',150)->nullable();
            $table->timestamps();
            $table->foreign('reviewer')
                ->references('id')->on('users');
            $table->foreign('reviewee')
                ->references('id')->on('users');
            $table->foreign('sent_offer_id')
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
        Schema::drop('affiliate_reviews');
    }
}
