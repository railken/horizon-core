<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
*/

Route::post('/sign-in', ['uses' => 'SignInController@index']);


Route::group(['middleware' => 'auth:api'], function () {
	Route::get('/user/profile', ['uses' => 'User\ProfileController@index']);


	Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
		Route::group(['prefix' => 'users'], function() {
			Route::get('/', ['uses' => 'UsersController@index'] );
			Route::post('/', ['uses' => 'UsersController@create'] );
			Route::get('/{id}', ['uses' => 'UsersController@show'] );
			Route::put('/{id}', ['uses' => 'UsersController@update'] );
			Route::delete('/{od}', ['uses' => 'UsersController@delete'] );
		} );
	} );

});
