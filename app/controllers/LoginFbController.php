<?php

class LoginFbController extends \BaseController {

	private $fb;

	public function __construct(FbHelper $fb){
		$this->fb = $fb;
	}

	public function login(){
		return Redirect::to($this->fb->getUrlLogin());
	}

	public function callback(){
		if(!$this->fb->generateSessionFromRedirect()){
			return Redirect::to('/')->with("message", "Error connection from facebook");
		}		

		//dd($this->fb->getGraph());
		$fb_user = $this->fb->getGraph();

		if(!$fb_user){
			return Redirect::to('/')->with("message", "Failed to retrieve data from facebook");
		}

		$user = User::whereFbId($fb_user->getProperty('id'))->first();

		if(empty($user)){
			$user = User::create([
			'user_role' => 'taumbayan',
			'email' => $fb_user->getProperty('email'),
			'fb_id' => $fb_user->getProperty('id')
			]);

			$profile = new Profile;
			$profile->firstname = $fb_user->getProperty('first_name');
			$profile->lastname = $fb_user->getProperty('last_name');

			$bod = date_create($fb_user->getProperty('birthday'));
			$profile->birthday = date_format($bod, 'Y-m-d');

			if($fb_user->getProperty('gender') == 'male'){
			$profile->gender = 'M';
			}else{
			$profile->gender = 'F';
			}

			$profile->photo = 'https://graph.facebook.com/'.$fb_user->getProperty('id').'/picture?type=large';

			$user->profile()->save($profile);
		}

		$user->fb_token = $this->fb->getToken();
		$user->save();

		Auth::login($user);

		return Redirect::to('/dashboard');
	}

}
