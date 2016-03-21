
<?php

class DashboardController extends BaseController {


	public function dashboard()
	{
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
		$profile = $user->profile;
		$sex = array('M' => 'Male','F' => 'Female');

    	return View::make('pages.dashboard')->with('profile', $profile)->with('user',$user)->with('sex', $sex);
	}

	public function updateProfile()
	{
		/*$rules = array(
		    'firstname'    => 'required|min:2', 		 
		    'lastname' => 'required|min:2'
		);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
		    return Redirect::to('dashboard')->withErrors($validator);
		} else {*/
			$user = User::with('profile')->find(Auth::user()->id);
			$profile = $user->profile;
			
			$profile->firstname = Input::get('inputfname');
			$profile->middlename = Input::get('inputmname');
			$profile->lastname = Input::get('inputlname');
			$profile->gender = Input::get('inputsex');
			$profile->birthday = Input::get('inputbirthday');
	        $profile->save();

	        return Redirect::intended('dashboard')->with('message','Profile updated successfully');		    
		//}
	}

	public function updateAccount()
	{	
		$user = User::find(Auth::user()->id);
		$user->password = Hash::make(Input::get('inputpw'));
		$user->save();
		
		return Redirect::intended('dashboard');
	}

	public function updateAvatar()
	{	
		if(Input::hasFile('file')){			
			$file=Input::file('file');
			$destinationPath = 'img/users/';		
			$user = User::with('profile')->find(Auth::user()->id);	

			$file->move(public_path($destinationPath), 'avatar_' . $user->id . '.' . $file->getClientOriginalExtension());
			$filename = $destinationPath . 'avatar_' . $user->id . '.' . $file->getClientOriginalExtension();
			
			$profile = $user->profile;
			$profile->photo = $filename;
			$profile->save();
			
			return Redirect::intended('dashboard')->with('message-upload','Upload successful');
		}
	}

}