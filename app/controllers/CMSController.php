<?php

use Illuminate\Support\MessageBag;

class CMSController extends BaseController{

	public function showLogin()
	{
		return View::make('admin.login');		
	}	

	public function showIndex()
	{		
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
		$profile = $user->profile;

    	return View::make('admin.index')->with('profile', $profile)->with('user',$user)->with('menu', 'dashboard');		
	}	

	public function showProfile(){
		return View::make('admin.profile');
	}

	public function showViewUsers()
	{	
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
		$profile = $user->profile;

		$taumbayan_user = User::with('profile')->whereNotIn('id', [Auth::user()->id])->get();
		return View::make('admin.users.view')->with('profile', $profile)->with('user',$user)->with('taumbayan', $taumbayan_user)->with('menu', 'user-view');
	}	

	public function showCreateUser()	
	{			
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
		$profile = $user->profile;	
		return View::make('admin.users.create')->with('profile', $profile)->with('user',$user)->with('menu', 'user-create');
	}	

	public function showViewPolls()
	{		
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
		$profile = $user->profile;

		$polls = Polls::get();
		return View::make('admin.polls.view')->with('profile', $profile)->with('user',$user)->with('polls', $polls)->with('menu', 'polls');		
	}	

	public function showCreatePolls()
	{			
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
		$profile = $user->profile;
		$categories = Category::orderby('Name', 'asc')->get();
		return View::make('admin.polls.create')->with('categories', $categories)->with('profile', $profile)->with('user',$user)->with('menu', 'polls');		
	}	
	
	/**Added by Ken**/
	public function doLogin()
	{
	// validate the info, create rules for the inputs
	$rules = array(
	    'username'    => 'required', // make sure the email is an actual email
	   // 'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
	    'password' => 'required'
	);

	// run the validation rules on the inputs from the form
	$validator = Validator::make(Input::all(), $rules);

	// if the validator fails, redirect back to the form
	if ($validator->fails()) {
	    return Redirect::to('admin')
	        ->withErrors($validator) // send back all errors to the login form
	        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
	} else {

	    // create our user data for the authentication
	    $userdata = array(
	    	'user_role' => 'admin',
	        'username'     => Input::get('username'),
	        'password'  => Input::get('password')
	    );

	    // attempt to do the login
	    if (Auth::attempt($userdata)) {
	        return Redirect::intended('/admin/index');

	    } else {        
	    	 $validator = new MessageBag(['invalid' => ['Invalid Login.']]);
	        // validation not successful, send back to form 
	        return Redirect::to('admin')
	        ->withErrors($validator)
	        ->withInput(Input::except('password'));
	    }

	}
	}

	public function doLogout()
	{
	    Auth::logout(); // log the user out of our application
	    return Redirect::to('admin'); // redirect the user to the login screen
	}

	public function doCreateUser()
	{

		$rules = array(
			'user_role' => 'required',
			'firstname' => 'required',
			'middlename' => 'required',
			'lastname' => 'required',
			'email' => 'required|email|unique:users',     // required and must be unique in the ducks table
	        'password' => 'required',
	        'password_confirmation' => 'required|same:password',
	        'gender' => 'required',
	        'birthday' => 'required'
		);
		$username = '';
		if(Input::get('user_role') == 'admin')
		{
			$rules = array_add($rules, 'username', 'required');
			$username = Input::get('username');
		}
		

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/admin/users/create')
            ->withErrors($messages)
            ->withInput(Input::except('password'));

    	} else {
    	$confirmation_code = str_random(30);
		$user = User::create([
			'user_role' => Input::get('user_role'),
			'username' => $username,
			'email' => Input::get('email'),
			'password' => Hash::make(Input::get('password'))
		]);

		$profile = new Profile([
			'firstname' => Input::get('firstname'),
			'middlename' => Input::get('middlename'),
			'lastname' => Input::get('lastname'),
			'gender' => Input::get('gender'),
			'birthday' => Input::get('birthday'),
            'verificationkey' => $confirmation_code
		]);

			if($user->profile()->save($profile)){
				return Redirect::to('/admin/users/create')->with('message', 'Successfully Created');
			}else{
				return Redirect::to('/admin/users/create')->with('errormsg', 'Something went wrong. Please contact the developer');
			}
    	}
	}

}
