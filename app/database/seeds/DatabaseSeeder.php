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
		$pass = Hash::make('taumb@y@nadmin');
		DB::table('users')->insert(array('id'=>'1','user_role'=>'admin','email'=>'admin@taumbayan.com','password'=>$pass));
		DB::table('profiles')->insert(array('user_id'=>'1','firstname'=>'Juan','gender'=>'M','isverified'=>'1'));

        DB::table('pollcategories')->insert(array('name' => 'Current Events'));
		DB::table('pollcategories')->insert(array('name' => 'Education'));
		DB::table('pollcategories')->insert(array('name' => 'Entertainment'));
		DB::table('pollcategories')->insert(array('name' => 'Health'));
		DB::table('pollcategories')->insert(array('name' => 'Politics'));
		DB::table('pollcategories')->insert(array('name' => 'Sports'));

		DB::table('polls')->insert(array("title" => "Na-survey ka na ba? Here's your chance. Vote now!", "question" => "Sino ba ang Presidente mo?", "type" => "upick", "categoryid" => "[\"5\"]", "submittedbyid" => "1", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32" ));
		DB::table('polls')->insert(array("title" => "Na-survey ka na ba? Here's your chance. Vote now!", "question" => "Sino ba ang Bise Presidente mo?", "type" => "upick", "categoryid" => "[\"5\"]", "submittedbyid" => "1", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32" ));

		DB::table('pollchoices')->insert(array("polls_id" => "1", "choice" => "roxas", "image" => "mar.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "1", "choice" => "duterte", "image" => "duterte.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "1", "choice" => "poe", "image" => "poe.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "1", "choice" => "santiago", "image" => "miriam.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "1", "choice" => "binay", "image" => "binay.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));

		DB::table('pollchoices')->insert(array("polls_id" => "2", "choice" => "cayetano", "image" => "cayetano.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "2", "choice" => "robredo", "image" => "robredo.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "2", "choice" => "trillanes", "image" => "trillanes.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "2", "choice" => "honassan", "image" => "honassan.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "2", "choice" => "marcos", "image" => "marcos.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
		DB::table('pollchoices')->insert(array("polls_id" => "2", "choice" => "escudero", "image" => "escudero.jpg", "created_at" => "2016-03-09 06:05:32", "updated_at" => "2016-03-09 06:05:32"));
  
	}

}
