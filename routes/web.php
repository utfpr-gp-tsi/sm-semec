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

Route::get('/login/signOut', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']); 
	Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'AdminController@index']); 
	Route::post('/edit/{id}/update', ['as' => 'profile.update', 'uses' => 'AdminController@update']);

	Route::get('/password/{id}/edit', ['as' => 'password', 'uses' => 'AdminController@edit']); 
	Route::post('/update/{id}/password', ['as' => 'password.update', 'uses' => 'AdminController@updatePassword']); 


});
});