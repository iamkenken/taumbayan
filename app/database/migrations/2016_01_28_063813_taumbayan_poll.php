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
        Schema::create('poll', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('question');
            $table->string('type');
            $table->integer('categoryid');
            $table->dateTime('startdate');
            $table->dateTime('end_date');
            $table->string('status');
            $table->integer('submittedbyid');
            $table->dateTime('submitted_date');
            $table->dateTime('lastmodified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('poll');
    }
}
