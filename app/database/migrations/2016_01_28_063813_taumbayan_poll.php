<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaumbayanPoll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('polls', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('question');
            $table->string('type');
            $table->string('categoryid');
            $table->dateTime('startdate');
            $table->dateTime('end_date');
            $table->string('status');
            $table->integer('submittedbyid');
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
        Schema::drop('polls');
    }
}
