<?php

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



	public function showLogin()
	{
		return View::make('pages.login');
	}

	public function doLogin()
	{
	// validate the info, create rules for the inputs
	$rules = array(
	    'email'    => 'required|email', // make sure the email is an actual email
	    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
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

	        // validation successful!
	        // redirect them to the secure section or whatever
	        // return Redirect::to('secure');
	        // for now we'll just echo success (even though echoing in a controller is bad)
	        return Redirect::intended('dashboard');

	    } else {        

	        // validation not successful, send back to form 
	        return Redirect::to('login');

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
	        'gender' => 'required',  
	        'birthday' => 'required'   
		);

		$validator = Validator::make(Input::all(), $rules);

		 if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/register')
            ->withErrors($validator);

    	} else {
    	$confirmation_code = str_random(30);
		$user = User::create([
			'type' => 'taumbayan',
			'firstname' => Input::get('firstname'),
			'lastname' => Input::get('lastname'),
			'email' => Input::get('email'),
			'username' => Input::get('username'),
			'password' => Hash::make(Input::get('password')),
			'gender' => Input::get('gender'),
			'birthday' => Input::get('birthday'),
            'verificationkey' => $confirmation_code,
		]);

		$user->save();

		$credentials = array(
	    'email' => Input::get('email'),
	    'password' => Input::get('password')
		);

		if (Auth::attempt($credentials))
		{
		    return Redirect::intended('dashboard');
		}

		}
	}


	public function dashboard()
	{
		return View::make('pages.dashboard');
	}


	public function submit_poll()
	{
		return View::make('pages.submit-poll');
	}

}
