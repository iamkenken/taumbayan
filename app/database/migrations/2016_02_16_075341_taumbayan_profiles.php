<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaumbayanProfiles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();	
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('gender', 1);
            $table->date('birthday');
            $table->string('photo');
            $table->dateTime('lastlogin');
            $table->boolean('isverified');
            $table->boolean('isVoter');
            $table->string('verificationkey');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }

}
