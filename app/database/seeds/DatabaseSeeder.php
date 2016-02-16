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

        DB::table('users')->insert([
        	'type' => 'taumbayan',
            'email' => str_random(10).'@gmail.com',
            'password' => Hash::make('secret'),
        ]);
  
	}

}
