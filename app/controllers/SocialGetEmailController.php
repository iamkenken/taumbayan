<?php

class SocialGetEmailController extends \BaseController {

	public function getFbEmail($process = null)
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
			
			return Redirect::to('register')->with('socialemail', $userProfile->email);


        }
        catch (Exception $e)
        {
            Log::notice($e);
            return $e->getMessage();
        }
    }

    public function getGplusEmail($process = null)
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
			
            return Redirect::to('register')->with('socialemail', $userProfile->email);

        }
        catch (Exception $e)
        {
            Log::notice($e);
            return $e->getMessage();
        }
    }

}
