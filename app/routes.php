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

//Social Auth Routes

Route::get('login/facebook/{process?}',
    array('as' => 'hybridauth', 'before' => 'guest', "uses" => 'SocialAuthController@facebookLogin')
);

Route::get('login/twitter/{process?}',
    array('as' => 'hybridauth', 'before' => 'guest', "uses" => 'SocialAuthController@twitterLogin')
);

Route::get('login/gplus/{process?}',
    array('as' => 'hybridauth', 'before' => 'guest', "uses" => 'SocialAuthController@gplusLogin')
);

Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'HomeController@confirm'
]);

/*AJAX ROutes*/
Route::post('auth/login', array('before'=>'csrf', 'uses' => 'AjaxController@doLogin'));
Route::post('auth/register', array('beore' => 'csrf', 'uses' => 'AjaxController@doRegister'));

/*Val Routes*/
Route::get('categories', array('uses' => 'CategoriesController@viewCategories'));
Route::get('category/{id}', array('as'=>'category', 'uses' => 'CategoriesController@viewCategory'));

Route::get('polls-types', array('uses' => 'PollsController@polls_types'));
Route::get('trending-polls', array('uses' => 'PollsController@trending_polls'));
Route::get('new-polls', array('uses' => 'PollsController@new_polls'));
Route::get('answered-polls', array('uses' => 'PollsController@answered_polls'));