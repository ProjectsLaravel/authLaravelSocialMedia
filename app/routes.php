<?php



/*Controls of auth*/
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@logout');

Route::get('showRegister', 'AuthController@registerUser'); //show view new user
Route::post('sign-up', ['as' => 'register', 'uses' => 'UserController@register' ] );//register new user

Route::get('passRecovery', 'UserController@showPassRecovery');

Route::post('password/reset', ['as' => 'sendMailRecovery', 'uses' => 'UserController@sendMailRecovery' ] );

Route::get('password/reset/{token}', ['as' => 'showResetPass', 'uses' => 'UserController@showResetPass' ] );
Route::post('password/reset/{token}', ['as' => 'resetPass', 'uses' => 'UserController@resetPass' ] );

/*routes for login Social*/

Route::get('login/fb', function() {
	$facebook = new Facebook(Config::get('facebook'));
	$params = array(
		'redirect_uri' => url('/login/fb/callback'),
		'scope' => 'email',
	);
	return Redirect::to($facebook->getLoginUrl($params));
});

Route::get('login/fb/callback', function() {
	$code = Input::get('code');
	if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

	$facebook = new Facebook(Config::get('facebook'));
	$uid = $facebook->getUser();

	if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

	$me = $facebook->api('/me');

	$profile = Profile::whereUid($uid)->first();
	if (empty($profile)) {

		$user = new User;
		$user->first_name = $me['first_name'];
		$user->last_name = $me['last_name'];
		$user->username = $me['first_name'];
		$user->password = $me['first_name'];
		$user->email = $me['email'];
		//$user->avatar = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

		$user->save();

		$profile = new Profile();
		$profile->uid = $uid;
		$profile->username = $me['first_name'];
		$profile = $user->profiles()->save($profile);
	}

	$profile->access_token = $facebook->getAccessToken();
	$profile->save();

	$user = $profile->user;

	Auth::login($user);

	return Redirect::to('dash')->with('message', 'Logged in with Facebook');
});

/*private routes only for users auth*/
Route::group(['before' => 'auth'], function()
{
	Route::get('/', 'HomeController@showWelcome');

	Route::get('dash', 'AuthController@showWelcome');

	Route::post('updateUser', ['as' => 'updateUser', 'uses' => 'UserController@updateUser' ] );

	Route::post('uploadImage', ['as' => 'uploadImage', 'uses' => 'UserController@uploadImage' ] );

	//Route::post('uploadImage', 'UserController@uploadImage');
});
