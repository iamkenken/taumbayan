<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

//Traditional PHP Reg/Login
Route::get('/register', array('uses' => 'HomeController@showRegister'));
Route::post('/register', array('uses' => 'HomeController@doRegister'));
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));

//Restricted Routes
Route::group(['before' => 'auth'], function(){
	Route::get('/dashboard', 'HomeController@dashboard');
	Route::get('/submit-poll', 'HomeController@submit_poll');
});

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('login/fb', 'LoginFbController@login');
Route::get('login/fb/callback', 'LoginFbController@callback');

/**Facebook Login
Route::get('fb-login', 'HomeController@doFblogin');
Route::get('fb-login/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/login')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/login')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    dd($me);
});

Route::get('fb-login/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/login')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/login')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->firstname = $me['first_name'];
        $user->lastname = $me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['username'];
        $profile = $user->profiles()->save($profile);
    }

    $user->fb_token = $facebook->getAccessToken();
    $user->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/dashboard')->with('message', 'Logged in with Facebook');
});

/*Route::get('/', function()
{
$data = array();

if (Auth::check()) {
    $data = Auth::user();
}
return View::make('user', array('data'=>$data));
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});*/




