<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('home/index');
});

Route::namespace('Admin')->group(function () {
	Route::prefix('admin')->group(function () {
    Route::get('/users', ['as' => 'users', 'uses' => 'UsersController@index']);
	Route::get('/users/new', ['as' => 'register', 'uses' => 'UsersController@create']);
	Route::post('/users', ['as' => 'users.register', 'uses' => 'UsersController@store']);
	Route::get('/users/{id}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
	Route::delete('/users/{id}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
	Route::get('/users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
	Route::patch('/users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);



		Route::get('/', [ 'as' => 'admin.dashboard' , 'uses' => 'HomeController@index']);
		Auth::routes(['register' => false]);


		Route::get('/login/signOut', ['as' => 'admin.logout', 'uses' => 'Auth\LoginController@logout']);
		Route::get('/profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
		Route::post('/profile/edit', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

		Route::get('/password/edit', ['as' => 'password.edit', 'uses' => 'ProfileController@editPassword']);
		Route::post('/password/edit', ['as' => 'password.update', 'uses' => 'ProfileController@updatePassword']);

	});



});




