<?php

class EmailController extends \BaseController 
{
	public function resendVerification()
	{
		$user = User::with('profile')->find(Auth::user()->id);
		$profile = $user->profile;
		$confirmation_code = $profile->verificationkey;

		$email = $user->email;
		$fname = $profile->firstname;
		$subject = 'Welcome to the Taumbayan Polls!';
		$data = array("firstname" => $fname, "confirmation_code" => $confirmation_code);


		Mail::send('emails.welcome', $data, function($message) use ($email, $fname, $subject, $confirmation_code)
		{
		    $message->to($email, $fname)->subject($subject);
		});

		return Redirect::to('/')->with('message', 'Thank you! Email has resent.');
	}
}