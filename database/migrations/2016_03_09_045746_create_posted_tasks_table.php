<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostedTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posted_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_poster')->unsigned();
            $table->integer('price');
            $table->date('date');
            $table->string('place');
            $table->string('preference');
            $table->string('status');
            $table->timestamps();
            $table->foreign('task_poster')
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
        Schema::drop('posted_tasks');
    }
}
