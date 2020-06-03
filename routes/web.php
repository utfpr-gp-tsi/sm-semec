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

Route::get('/',  ['as' => 'root_path',    'uses' => 'HomeController@index']);

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {
	/* Session
	|-------------------------------------------------------------------------- */
	Auth::routes(['register' => false]);

	Route::get('/login/signOut',  ['as' => 'admin.logout',          'uses' => 'Auth\LoginController@logout']);
	Route::get('/profile/edit',   ['as' => 'admin.profile.edit',    'uses' => 'ProfileController@edit']);
	Route::put('/profile/edit',   ['as' => 'admin.profile.update',  'uses' => 'ProfileController@update']);

	Route::get('/password/edit',  ['as' => 'admin.password.edit',   'uses' => 'ProfileController@editPassword']);
	Route::post('/password/edit', ['as' => 'admin.password.update', 'uses' => 'ProfileController@updatePassword']);

	/* Dashboard
	|-------------------------------------------------------------------------- */
	Route::get('/', [ 'as' => 'admin.dashboard' , 'uses' => 'HomeController@index']);

	/* Users resources
	|-------------------------------------------------------------------------- */
	Route::get('/users',                ['as' => 'admin.users',        'uses' => 'UsersController@index']);
	Route::get('/users/search/{term}',  ['as' => 'admin.search.users', 'uses' => 'UsersController@index']);
	Route::get('/users/new',	    ['as' => 'admin.new.user',     'uses' => 'UsersController@new']);
	Route::post('/users',		    ['as' => 'admin.create.user',  'uses' => 'UsersController@create']);
	Route::get('/users/{id}',	    ['as' => 'admin.show.user',    'uses' => 'UsersController@show']);
	Route::get('/users/{id}/edit',	    ['as' => 'admin.edit.user',    'uses' => 'UsersController@edit']);
	Route::patch('/users/{id}',	    ['as' => 'admin.update.user',  'uses' => 'UsersController@update']);
	Route::delete('/users/{id}',	    ['as' => 'admin.destroy.user', 'uses' => 'UsersController@destroy']);

	/* Servants resources
	|-------------------------------------------------------------------------- */
	Route::get('/servants/page/{page}',    ['as' => 'admin.servants.page',   'uses' => 'ServantsController@index']);
	Route::get('/servants',      	       ['as' => 'admin.servants',        'uses' => 'ServantsController@index']);
	Route::get('/servants/search/{term}/page/{page}',
					       ['as' => 'admin.search.servants.page', 'uses' => 'ServantsController@index']);
	Route::get('/servants/search/{term}',  ['as' => 'admin.search.servants',      'uses' => 'ServantsController@index']);
	Route::get('/servants/{id}',           ['as' => 'admin.show.servant',         'uses' => 'ServantsController@show']);
    });
});
