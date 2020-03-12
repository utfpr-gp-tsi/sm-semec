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
		Route::get('/', [ 'as' => 'index' , 'uses' => 'HomeController@index']);
	Auth::routes(['register' => false]);
	Route::get('/registerUsers', ['as' => 'register', 'uses' => 'UsersController@index']);
	Route::post('/registerUsers/save', ['as' => 'users.register', 'uses' => 'UsersController@store']);



Route::get('/login/signOut', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']); //
	});


});


