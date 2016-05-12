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
	
	public function sponsored_polls()
	{
		if(Auth::check()){
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			return View::make('pages.sponsored-polls')->with('profile', $profile)->with('user',$user);
		}else{
			return View::make('pages.sponsored-polls');
		}
	}

	public function single_poll($id, $title){
		$poll = Polls::with('pollchoices')->find($id);
		$choices = $poll->pollchoices;
		$ans = PollAnswers::get();
		if(!empty($poll)){
			if(Auth::check()){
				$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
				$profile = $user->profile;
				return View::make('pages.single-poll')->with('profile', $profile)->with('user',$user)->with('poll', $poll)->with('choices', $choices)->with('answers', $ans);
			}else{
				return View::make('pages.single-poll')->with('poll', $poll)->with('choices', $choices)->with('answers', $ans);
			}
		}else{
			return Redirect::to('/');
		}
	}
		
	public function upick(){
		/*$poll = Polls::with('pollchoices')->where("type","upick")->first();
		$choices = $poll->pollchoices;
		$ans = PollAnswers::get();
		$poll = new Polls;
		$polls = $poll->upick;*/
		$polls = Polls::with('pollchoices', 'pollanswers')->where("type","upick")->get();

		if(!empty($polls)){
			if(Auth::check()){
				$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
				$profile = $user->profile;
				return View::make('pages.home-new')->with('profile', $profile)->with('user',$user)->with('polls', $polls);
			}else{
				return View::make('pages.home-new')->with('polls', $polls);
			}
		}else{
			return Redirect::to('/');
		}
	}

	public function single_type($type)
	{
		$where = ["type" => $type, "status" => 'published'];
		$polls = Polls::with('pollchoices', 'pollanswers')->where($where)->get();
		if(Auth::check())
		{
			$user = User::with('profile')->find(Auth::user()->id);
			$profile = $user->profile;
			return View::make('pages.single-type')->with('profile', $profile)->with('user', $user)->with('type', $type)->with('polls', $polls);
		}
		else
		{
			return View::make('pages.single-type')->with('type', $type)->with('polls', $polls);
		}
	}

	public function preview()
	{
		if(Auth::check())
		{
			$user = User::with('profile')->find(Auth::user()->id);
			$profile = $user->profile;
			return View::make('pages.preview')->with('profile', $profile)->with('user', $user);
		}
	}

}
