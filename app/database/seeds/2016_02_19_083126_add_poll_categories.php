<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPollCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('pollcategories')->insert(array('name' => 'Current Events'));
		DB::table('pollcategories')->insert(array('name' => 'Education'));
		DB::table('pollcategories')->insert(array('name' => 'Entertainment'));
		DB::table('pollcategories')->insert(array('name' => 'Health'));
		DB::table('pollcategories')->insert(array('name' => 'Politics'));
		DB::table('pollcategories')->insert(array('name' => 'Sports'));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('pollcategories')->delete(1);
		DB::table('pollcategories')->delete(2);
		DB::table('pollcategories')->delete(2);
		DB::table('pollcategories')->delete(3);
		DB::table('pollcategories')->delete(4);
		DB::table('pollcategories')->delete(5);
	}

}
