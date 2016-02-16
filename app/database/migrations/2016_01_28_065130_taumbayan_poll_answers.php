<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaumbayanPollAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pollanswers', function(Blueprint $table){
            $table->increments('id');
            $table->integer('pollid');
            $table->integer('userid');
            $table->integer('choiceid');
            $table->dateTime('answerdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pollanswers');
    }
}
