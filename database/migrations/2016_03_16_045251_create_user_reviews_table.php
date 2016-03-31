<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reviewer')->unsigned();
            $table->integer('reviewee')->unsigned();
            $table->integer('posted_task_id')->unsigned();
            $table->integer('rate');
            $table->string('comment',150)->nullable();
            $table->timestamps();
            $table->foreign('reviewer')
                  ->references('id')->on('users');
            $table->foreign('reviewee')
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
        Schema::drop('user_reviews');
    }
}
