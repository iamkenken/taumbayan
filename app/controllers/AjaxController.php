<?php

class AjaxController extends \BaseController {

	public function doLogin()
	{
		$userdata = array(
	        'email'     => Input::get('email'),
	        'password'  => Input::get('pass')
	    );

		if (Request::ajax()) {
			if (Auth::attempt($userdata)) {
			    //return Redirect::intended('dashboard');
				$response = array('status' => 'success');
		 
				return Response::json( $response );
			}
		}
		
		$response = array('status' => 'failed');
		return Response::json( $response );
	}

	public function doRegister(){
		if(Request::ajax()){
			$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|email|unique:users',     // required and must be unique in the ducks table
	        'password' => 'required',
	        'password_confirmation' => 'required|same:password',
	        'gender' => 'required' 
	        //'birthday' => 'required'   
			);

			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
		        // get the error messages from the validator
		        $messages = $validator->messages();
		        return Response::json($messages);

	    	}else{
	    		$confirmation_code = str_random(30);
				$user = User::create([
					'user_role' => 'taumbayan',
					'email' => Input::get('email'),
					'password' => Hash::make(Input::get('password'))
				]);

				$profile = new Profile([
					'firstname' => Input::get('firstname'),
					'lastname' => Input::get('lastname'),
					'gender' => Input::get('gender'),
					'birthday' => Input::get('birthday'),
		            'verificationkey' => $confirmation_code
				]);

				$user->profile()->save($profile);
				$pass = Input::get('password');
				$email = Input::get('email');
				$fname = Input::get('firstname');
				$lname = Input::get('lasttname');
				$subject = 'Welcome to the Taumbayan Polls!';
				$data = array("firstname" => $fname, "confirmation_code" => $confirmation_code);


				Mail::send('emails.welcome', $data, function($message) use ($email, $fname, $lname, $subject, $confirmation_code)
				{
				    $message->to($email, $fname.' '.$lname)->subject($subject);
				});

				$credentials = array(
			    'email' => $email,
			    'password' => $pass
				);

				if (Auth::attempt($credentials))
				{
				    return Response::json(array("status" => "success"));
				}else{
					return Response::json(array("status" => "failed"));
				}
	    	}
		}
	}

}
