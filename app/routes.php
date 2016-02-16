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

Route::get('/', function()
{
	return View::make('pages.home');
});

// route to show the login form
Route::get('/register', array('uses' => 'HomeController@showRegister'));

Route::post('/register', array('uses' => 'HomeController@doRegister'));

Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::group(['before' => 'auth'], function(){
	Route::get('/dashboard', 'HomeController@dashboard');
	Route::get('/submit-poll', 'HomeController@submit_poll');
});

Route::get('logout', array('uses' => 'HomeController@doLogout'));

