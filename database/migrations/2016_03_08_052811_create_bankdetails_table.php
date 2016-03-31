<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate')->unsigned();
            $table->string('name');
            $table->string('bank_name');
            $table->string('bsb');
            $table->string('account_no');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('affiliate')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank_details');
    }
}
