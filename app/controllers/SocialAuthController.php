<?php

class SocialAuthController extends \BaseController {

	public function facebookLogin($process = null)
    {
        if ($process)
        {
            try
            {
                return Hybrid_Endpoint::process();
            }
            catch (Exception $e)
            {
                return Redirect::route('hybridauth');
            }
        }
        try
        {
            $oauth = new Hybrid_Auth(Config::get('social'));
            $provider = $oauth->authenticate("Facebook");
            $userProfile = $provider->getUserProfile();

			//auto login to dashboard - insert info to database
            $user = User::whereFbId($userProfile->identifier)->first();

			if(empty($user)){
				if (User::where('email', '=', $userProfile->email)->exists()) {
					$user = User::whereEmail($userProfile->email)->first();
					$user->fb_id = $userProfile->identifier;
					$user->save();
				}else{
					$user = User::create([
					'user_role' => 'taumbayan',
					'email' => $userProfile->email,
					'fb_id' => $userProfile->identifier
					]);

					$profile = new Profile;
					$profile->firstname = $userProfile->firstName;
					$profile->lastname = $userProfile->lastName;

					
					if(!empty($userProfile->birthYear) && !empty($userProfile->birthMonth) && !empty($userProfile->birthDay)){
					$bod = date_create($userProfile->birthYear.'-'.$userProfile->birthMonth.'-'.$userProfile->birthDay);
					$profile->birthday = date_format($bod, 'Y-m-d');
					}

					if($userProfile->gender == 'male'){
					$profile->gender = 'M';
					}else{
					$profile->gender = 'F';
					}

					$profile->photo = $userProfile->photoURL;

					$user->profile()->save($profile);
				}
			}

			//$user->fb_token = $userProfile->access_token;
			//$user->save();
			Auth::login($user);
			return Redirect::to('/dashboard');

			//return var_dump($userProfile);

        }
        catch (Exception $e)
        {
            Log::notice($e);
            return $e->getMessage();
        }
    }

    public function twitterLogin($process = null)
    {
        if ($process)
        {
            try
            {
                return Hybrid_Endpoint::process();
            }
            catch (Exception $e)
            {
                return Redirect::route('hybridauth');
            }
        }
        try
        {
            $oauth = new Hybrid_Auth(Config::get('social'));
            $provider = $oauth->authenticate("Twitter");
            $userProfile = $provider->getUserProfile();
            $provider->logout();

 			//auto login to dashboard - insert info to database
            $user = User::whereTwitterId($userProfile->identifier)->first();

			if(empty($user)){
				if (User::where('email', '=', $userProfile->email)->exists()) {
					$user = User::whereEmail($userProfile->email)->first();
					$user->twitter_id = $userProfile->identifier;
					$user->save();
				}else{
					$user = User::create([
					'user_role' => 'taumbayan',
					'email' => 'twitterdontprovide@twitter.com',
					'twitter_id' => $userProfile->identifier
					]);

					$profile = new Profile;
					$profile->firstname = $userProfile->firstName;
					//$profile->lastname = $userProfile->lastName;

					if(!empty($userProfile->birthYear) && !empty($userProfile->birthMonth) && !empty($userProfile->birthDay)){
					$bod = date_create($userProfile->birthYear.'-'.$userProfile->birthMonth.'-'.$userProfile->birthDay);
					$profile->birthday = date_format($bod, 'Y-m-d');
					}

					if($userProfile->gender == 'male'){
					$profile->gender = 'M';
					}else{
					$profile->gender = 'F';
					}

					$profile->photo = $userProfile->photoURL;

					$user->profile()->save($profile);
				}
			}

			//$user->fb_token = $userProfile->access_token;
			//$user->save();
			Auth::login($user);
			return Redirect::to('/dashboard');           
        	//return var_dump($userProfile);
        }
        catch (Exception $e)
        {
            Log::notice($e);
            return $e->getMessage();
        }
    }

    public function gplusLogin($process = null)
    {
        if ($process)
        {
            try
            {
                return Hybrid_Endpoint::process();
            }
            catch (Exception $e)
            {
                return Redirect::route('hybridauth');
            }
        }
        try
        {
            $oauth = new Hybrid_Auth(Config::get('social'));
            $provider = $oauth->authenticate("Google");
            $userProfile = $provider->getUserProfile();
            $provider->logout();

            //auto login to dashboard - insert info to database
            $user = User::whereGplusId($userProfile->identifier)->first();

			if(empty($user)){

			if (User::where('email', '=', $userProfile->email)->exists()) {
				$user = User::whereEmail($userProfile->email)->first();
				$user->gplus_id = $userProfile->identifier;
				$user->save();
			}else{
				$user = User::create([
				'user_role' => 'taumbayan',
				'email' => $userProfile->email,
				'gplus_id' => $userProfile->identifier
				]);

				$profile = new Profile;
				$profile->firstname = $userProfile->firstName;
				$profile->lastname = $userProfile->lastName;

				if(!empty($userProfile->birthYear) && !empty($userProfile->birthMonth) && !empty($userProfile->birthDay)){
				$bod = date_create($userProfile->birthYear.'-'.$userProfile->birthMonth.'-'.$userProfile->birthDay);
				$profile->birthday = date_format($bod, 'Y-m-d');
				}

				if($userProfile->gender == 'male'){
				$profile->gender = 'M';
				}else{
				$profile->gender = 'F';
				}

				$profile->photo = $userProfile->photoURL;

				$user->profile()->save($profile);
			}
			}

			//$user->fb_token = $userProfile->access_token;
			//$user->save();
			Auth::login($user);
			return Redirect::to('/dashboard');           
        	//return var_dump($userProfile);
        }
        catch (Exception $e)
        {
            Log::notice($e);
            return $e->getMessage();
        }
    }

}
