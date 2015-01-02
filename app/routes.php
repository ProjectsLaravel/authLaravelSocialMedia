<?php



/*Controls of auth*/
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@logout');


/*private routes only for users auth*/
Route::group(['before' => 'auth'], function()
{
	Route::get('/', 'HomeController@showWelcome');
});
