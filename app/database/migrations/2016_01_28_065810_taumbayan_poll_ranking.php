<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaumbayanPollRanking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pollranks', function(Blueprint $table){
        $table->increments('id');
        $table->integer('pollid');
        $table->integer('userid');
        $table->integer('choiceid');
        $table->integer('rank');
        $table->dateTime('answerdate');
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
        Schema::drop('pollranks');
    }
}
