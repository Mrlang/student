<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/user/login','UsersController@login');
// Route::post('/user/login','UsersController@loginHandle');
// Route::get('/user/register','UsersController@register');
// Route::post('/user/register','UsersController@registerHandle');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::post('/users/changeLike','UsersController@changeLike');
    Route::post('/users/changeInfo','UsersController@changeInfo');
//    Route::get('/users/changeLike','UsersController@changeLike');
    Route::get('/users/changeLike','UsersController@likeForm');
    Route::get('/users/changeInfo','UsersController@infoForm');
	Route::get('/home', 'HomeController@index');
//	Route::get('/getFriends','HomeController@getFriends');
    Route::get('/show/{id}', 'UsersController@showInfo');
    Route::post('/postCon', 'UsersController@postCon');
    Route::get('/table/{id}', 'HomeController@getTable');
});


