<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();

Route::group(['middleware' => ['auth']], function() {
	route::get('/', function(){
		if( Auth::check() ) {
			if(Auth::user()->hasRole('admin')) {
				return Redirect::route('user.admin');
			} else {
				return Redirect::route('user.profile');
			}
		}
	});

	Route::get('admin', ['as' => 'user.admin', 'uses' => 'AdminController@index']);
	Route::get('user', ['as' => 'user.profile', 'uses' => 'UserController@index']);

});


/*Route::get('/home', 'HomeController@index');*/
