<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaumbayanPollChoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pollchoices', function(Blueprint $table){
            $table->increments('id');
            $table->integer('polls_id')->unsigned();
            $table->string('choice');
            $table->text('image');
            $table->string('order');
            $table->timestamps();

            $table->foreign('polls_id')->references('id')->on('polls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pollchoices');
    }
}
