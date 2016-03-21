<?php

class AdminController extends \BaseController
{

	public function viewUsers()
	{
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
		$profile = $user->profile;

		return View::make('pages.view-users')->with('profile', $profile)->with('user',$user)->with('users', Profile::All());
	}
	
	public function viewVotes($pollid = null)
	{
		if($pollid != null)
		{
			$poll = Polls::whereId($pollid)->first();
			$pollanswers = Pollanswers::wherePollid($pollid)->get();
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			if($user->user_role == 'admin')
			{
				return View::make('pages.view-votes')->with('profile', $profile)->with('user',$user)->with('answers', $pollanswers)->with('poll', $poll);
			}
			else
			{
				return Redirect::to('/');
			}
		}
		else
		{
			return Redirect::to('/');
		}

		
	}

	/*public function verifyVote()
	{
		$id = $_GET['id'];
		$pollanswer = Pollanswers::whereId($id)->first();
		$pollanswer->status = 1;
		$pollanswer->save();
		if($pollanswer){
			$poll = Polls::whereId($pollanswer->pollid)->first();	
			$user = User::with('profile')->find($pollanswer->userid);
			$profile = $user->profile;
			$email = $user->email;
			$fname = $profile->firstname;
			$subject = 'Your vote just got verified';
			$data = array("firstname" => $fname, "title" => $poll->question);


			Mail::send('emails.verifiedvote', $data, function($message) use ($email, $fname, $subject)
			{
			    $message->to($email, $fname)->subject($subject);
			});

			return Response::json(array('status' => 'success'));
		}else{
			return Response::json(array('status' => 'failed'));
		}
	}

	public function unverifyVote()
	{
		$id = $_GET['id'];
		$pollanswer = Pollanswers::whereId($id)->first();
		$pollanswer->status = 0;
		$pollanswer->save();
		if($pollanswer){
			return Response::json(array('status' => 'success'));
		}else{
			return Response::json(array('status' => 'failed'));
		}
	}*/

	public function verifyVote()
	{
		$id = $_GET['id'];
		$user = User::with('profile')->whereId($id)->first();
		$profile = $user->profile;
		$profile->isvoter = 1;
		$profile->save();
		if($user){
			$profile = $user->profile;
			$email = $user->email;
			$fname = $profile->firstname;
			$subject = 'Your are now a verified voter';
			$data = array("firstname" => $fname);


			Mail::send('emails.verifiedvote', $data, function($message) use ($email, $fname, $subject)
			{
			    $message->to($email, $fname)->subject($subject);
			});

			return Response::json(array('status' => 'success'));
		}else{
			return Response::json(array('status' => 'failed'));
		}
	}

	public function unverifyVote()
	{
		$id = $_GET['id'];
		$user = User::with('profile')->whereId($id)->first();
		$profile = $user->profile;
		$profile->isvoter = 0;
		$profile->save();
		if($user){
			return Response::json(array('status' => 'success'));
		}else{
			return Response::json(array('status' => 'failed'));
		}
	}
}