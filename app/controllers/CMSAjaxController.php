<?php

class CMSAjaxController extends \BaseController
{
	public function deleteUser(){
		$userId = Input::get('id');
		$user = User::with('profile')->find($userId);
		if($user->profile->delete()){
			$user->delete();
			return Response::json(array('status' => 'ok'));
		}else{
			return Response::json(array('status' => 'failed'));
		}
	}

	public function approvePoll()
	{
		$id = $_POST['id'];
		$poll = Polls::whereId($id)->first();
		$poll->status = 'published';
		
		if($poll->save()){
			/*$profile = $user->profile;
			$email = $user->email;
			$fname = $profile->firstname;
			$subject = 'Your are now a verified voter';
			$data = array("firstname" => $fname);


			Mail::send('emails.verifiedvote', $data, function($message) use ($email, $fname, $subject)
			{
			    $message->to($email, $fname)->subject($subject);
			});*/

			return Response::json(array('status' => 'success'));
		}else{
			return Response::json(array('status' => 'failed'));
		}
	}

	public function unapprovedPoll()
	{
		$id = $_POST['id'];
		$poll = Polls::whereId($id)->first();
		$poll->status = 'pending';
		if($poll->save()){
			return Response::json(array('status' => 'success'));
		}else{
			return Response::json(array('status' => 'failed'));
		}
	}
}