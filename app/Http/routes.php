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
	

	Route::get('user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
	Route::post('user/create', ['as' => 'user.store', 'uses' => 'UserController@store']);
	Route::get('user/list', ['as' => 'user.list', 'uses' => 'UserController@userlist']);
	Route::get('user/{id}/show',['as' => 'user.show', 'uses' => 'UserController@show']);
	Route::get('user/{id}/edit',['as'=>'user.edit','uses'=>'UserController@edit']);
	Route::patch('user/{id}',['as'=>'user.update','uses'=>'UserController@update']);
	Route::delete('user/{id}',['as'=>'user.destroy','uses'=>'UserController@destroy']);

	/*Roles*/
	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	/*voucher*/
	Route::get('vouchers',['as'=>'vouchers.index','uses'=>'VoucherController@index','middleware' => ['permission:generate-voucher|assign-voucher']]);
	Route::get('vouchers/create',['as'=>'vouchers.create','uses'=>'VoucherController@create','middleware' => ['permission:generate-voucher|assign-voucher']]);
	Route::post('vouchers/generate',['as'=>'vouchers.generate','uses'=>'VoucherController@generateVoucherCode','middleware' => ['permission:generate-voucher|assign-voucher']]);

	/*credits*/
	Route::get('credits',['as'=>'credits.index','uses'=>'CreditsController@index']);
	Route::patch('credits/update',['as'=>'credits.update','uses'=>'CreditsController@updatecredit']);
	/*duration*/
	Route::get('durations',['as'=>'durations.index','uses'=>'CreditsController@users_duration']);
	Route::get('durations/{id}/edit',['as'=>'duration.edit','uses'=>'CreditsController@edit']);
	Route::patch('duration/{id}',['as'=>'duration.update','uses'=>'CreditsController@update']);



});



