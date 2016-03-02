<?php

class PollsController extends BaseController{

	public $restful=true;	

	public function submit_poll()
	{
		if(Auth::check()){
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			$categories = Category::orderby('Name', 'asc')->get();
			return View::make('pages.submit-poll')->with('profile', $profile)->with('user',$user)->with('categories', $categories);
		}else{
			return View::make('pages.submit-poll');
		}
	}

	public function polls_types()
	{
		if(Auth::check()){
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			return View::make('pages.polls-types')->with('profile', $profile)->with('user',$user);
		}else{
			return View::make('pages.polls-types');
		}
	}
	
	public function trending_polls()
	{
		if(Auth::check()){
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			return View::make('pages.trending-polls')->with('profile', $profile)->with('user',$user);
		}else{
			return View::make('pages.trending-polls');
		}
	}
	
	public function new_polls()
	{
		if(Auth::check()){
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			return View::make('pages.new-polls')->with('profile', $profile)->with('user',$user);
		}else{
			return View::make('pages.new-polls');
		}
	}
	
	public function answered_polls()
	{
		if(Auth::check()){
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			return View::make('pages.answered-polls')->with('profile', $profile)->with('user',$user);
		}else{
			return View::make('pages.answered-polls');
		}
	}
		

}
