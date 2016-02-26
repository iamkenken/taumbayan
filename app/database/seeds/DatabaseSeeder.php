<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

       /* DB::table('users')->insert([
        	'user_role' => 'taumbayan',
            'email' => str_random(10).'@gmail.com',
            'password' => Hash::make('secret'),
        ]);*/

        DB::table('pollcategories')->insert(array('name' => 'Current Events'));
		DB::table('pollcategories')->insert(array('name' => 'Education'));
		DB::table('pollcategories')->insert(array('name' => 'Entertainment'));
		DB::table('pollcategories')->insert(array('name' => 'Health'));
		DB::table('pollcategories')->insert(array('name' => 'Politics'));
		DB::table('pollcategories')->insert(array('name' => 'Sports'));
  
	}

}
