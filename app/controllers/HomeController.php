<?php

use Illuminate\Support\MessageBag;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){
		if(Auth::check()){
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			return View::make('pages.home')->with('profile', $profile)->with('user',$user);
		}else{
			return View::make('pages.home');
		}
	}

	public function showLogin()
	{
		return View::make('pages.login');
	}

	public function doLogin()
	{
	// validate the info, create rules for the inputs
	$rules = array(
	    'email'    => 'required|email', // make sure the email is an actual email
	   // 'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
	    'password' => 'required'
	);

	// run the validation rules on the inputs from the form
	$validator = Validator::make(Input::all(), $rules);

	// if the validator fails, redirect back to the form
	if ($validator->fails()) {
	    return Redirect::to('login')
	        ->withErrors($validator) // send back all errors to the login form
	        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
	} else {

	    // create our user data for the authentication
	    $userdata = array(
	        'email'     => Input::get('email'),
	        'password'  => Input::get('password')
	    );

	    // attempt to do the login
	    if (Auth::attempt($userdata)) {
	        return Redirect::intended('dashboard');

	    } else {        
	    	 $validator = new MessageBag(['invalid' => ['Email and/or password invalid.']]);
	        // validation not successful, send back to form 
	        return Redirect::to('login')
	        ->withErrors($validator)
	        ->withInput(Input::except('password'));
	    }

	}
	}

	public function doLogout()
	{
	    Auth::logout(); // log the user out of our application
	    return Redirect::to('login'); // redirect the user to the login screen
	}

	public function showRegister()
	{
		return View::make('pages.register');
	}

	public function doRegister()
	{

		$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|email|unique:users',     // required and must be unique in the ducks table
	        'password' => 'required',
	        'password_confirmation' => 'required|same:password',
	        //'gender' => 'required' ,
	        //'birthday' => 'required'   
	        'g-recaptcha-response' => 'required' 
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/register')
            ->withErrors($validator)
            ->withInput(Input::except('password'));

    	} else {
    	$confirmation_code = str_random(30);
		$user = User::create([
			'user_role' => 'taumbayan',
			'email' => Input::get('email'),
			'password' => Hash::make(Input::get('password'))
		]);

		$profile = new Profile([
			'firstname' => Input::get('firstname'),
			'lastname' => Input::get('lastname'),
			//'gender' => Input::get('gender'),
			//'birthday' => Input::get('birthday'),
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
		    return Redirect::intended('dashboard');
		}else{
			return Redirect::to('login');
		}

		}
	}

	public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $profile = Profile::whereVerificationkey($confirmation_code)->first();

        if ( ! $profile)
        {
            throw new InvalidConfirmationCodeException;
        }

        $profile->isverified = 1;
        $profile->save();

        return Redirect::to('login');
    }

	public function dashboard()
	{
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
		$profile = $user->profile;

    	return View::make('pages.dashboard')->with('profile', $profile)->with('user',$user);
	}


}
