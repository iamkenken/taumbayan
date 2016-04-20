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

//Route::get('/', 'HomeController@index');
Route::get('/', 'HomeController@index');

//Traditional PHP Reg/Login
Route::get('/register', array('uses' => 'HomeController@showRegister'));
Route::post('/register', array('uses' => 'HomeController@doRegister'));
Route::get('login', array('before' => 'guest', 'uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));

//Restricted Routes
Route::group(['before' => 'auth'], function(){
	Route::get('/dashboard', 'DashboardController@dashboard');
	Route::get('/submit-poll', 'PollsController@submit_poll');
});

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('login/fb', 'LoginFbController@login');
Route::get('login/fb/callback', 'LoginFbController@callback');

Route::get('password/forgot', 'RemindersController@getRemind');
Route::post('password/forgot', 'RemindersController@postRemind');
Route::get('password/reset/{token}', 'RemindersController@getReset');
Route::post('password/reset/{token}', 'RemindersController@postReset');

//Social Auth Routes - Auto login

Route::get('login/facebook/{process?}',
    array('as' => 'hybridauth', 'before' => 'guest', "uses" => 'SocialAuthController@facebookLogin')
);

/*Route::get('login/twitter/{process?}',
    array('as' => 'hybridauth', 'before' => 'guest', "uses" => 'SocialAuthController@twitterLogin')
);*/

Route::get('login/gplus/{process?}',
    array('as' => 'hybridauth', 'before' => 'guest', "uses" => 'SocialAuthController@gplusLogin')
);

/**Get Social email and redirect to SignUp Form
Route::get('login/facebook/{process?}',
    array('as' => 'hybridauth', 'before' => 'guest', "uses" => 'SocialGetEmailController@getFbEmail')
);

Route::get('login/gplus/{process?}',
    array('as' => 'hybridauth', 'before' => 'guest', "uses" => 'SocialGetEmailController@getGplusEmail')
);**/

//Email Verification Route

Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'HomeController@confirm'
]);

Route::get('resend-verification', 'EmailController@resendVerification');

/*AJAX ROutes*/
Route::post('auth/login', array('before'=>'csrf', 'uses' => 'AjaxController@doLogin'));
Route::post('auth/register', array('before' => 'csrf', 'uses' => 'AjaxController@doRegister'));
Route::get('auth/check', array('uses' => 'AjaxController@checkUser'));

Route::post('poll/add/mc', array('before' => 'auth', 'uses' => 'AjaxPollController@addPollMc'));
Route::post('poll/add/ranking', array('before' => 'auth', 'uses' => 'AjaxPollController@addPollRank'));
Route::post('poll/add/rating', array('before' => 'auth', 'uses' => 'AjaxPollController@addPollRating'));
Route::post('poll/add/thumbs', array('before' => 'auth', 'uses' => 'AjaxPollController@addPollThumb'));
Route::post('poll/add/mood', array('before' => 'auth', 'uses' => 'AjaxPollController@addPollMood'));
Route::post('poll/add/upick', array('before' => 'auth', 'uses' => 'AjaxPollController@addPollUpick'));
Route::post('poll/vote/upick', array('before' => 'auth', 'uses' => 'AjaxPollController@votePollUpick'));

Route::get('single-poll/{id}/{title}', array('uses' => 'PollsController@single_poll'));


Route::get('view-votes/{pollid}', array('before' => 'auth', 'uses' => 'AdminController@viewVotes'));
Route::get('view-users', array('before' => 'auth', 'uses' => 'AdminController@viewUsers'));
Route::get('verify-vote', 'AdminController@verifyVote');
Route::get('unverify-vote', 'AdminController@unverifyVote');

/*Val Routes*/
Route::get('categories', array('uses' => 'CategoriesController@viewCategories'));
Route::get('category/{id}', array('as'=>'category', 'uses' => 'CategoriesController@viewCategory'));

Route::get('polls-types', array('uses' => 'PollsController@polls_types'));
Route::get('trending-polls', array('uses' => 'PollsController@trending_polls'));
Route::get('new-polls', array('uses' => 'PollsController@new_polls'));
Route::get('sponsored-polls', array('uses' => 'PollsController@sponsored_polls'));


/* Dashboard Updates */
Route::post('dashboard/update-profile', array('uses' => 'DashboardController@updateProfile'));
Route::post('dashboard/update-account', array('uses' => 'DashboardController@updateAccount'));
Route::post('dashboard/update-avatar', array('uses' => 'DashboardController@updateAvatar'));

/* CMS */
Route::get('admin', array('uses' => 'CMSController@showLogin'));
Route::post('admin', array('uses' => 'CMSController@doLogin'));
Route::get('admin/index', array('before' => 'auth', 'uses' => 'CMSController@showIndex'));
Route::get('admin/profile', array('before' => 'auth', 'uses' => 'CMSController@showProfile'));
Route::get('admin/users/view', array('before' => 'auth', 'uses' => 'CMSController@showViewUsers'));
Route::get('admin/users/create', array('before' => 'auth', 'uses' => 'CMSController@showCreateUser'));
Route::get('admin/polls/view', array('before' => 'auth', 'uses' => 'CMSController@showViewPolls'));
Route::get('admin/polls/create', array('before' => 'auth', 'uses' => 'CMSController@showCreatePolls'));
Route::get('admin/logout', array('uses' => 'CMSController@doLogout'));

Route::post('admin/users/create', array('before' => 'auth', 'uses' => 'CMSController@doCreateUser'));
Route::post('admin/user/delete', array('before' => 'auth', 'uses' => 'CMSAjaxController@deleteUser'));
