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

//Route::get('/', function () {
//    return view('loginhome');
//});

Route::get('github', 'Github\GithubController@top');
Route::post('github/issue', 'Github\GithubController@createIssue');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('user', 'User\UserController@updateUser');

//Route::get('/', 'HomeController@index');
Route::post('/upload', 'PostController@upload');

Route::get('/logout/github', 'Auth\LoginController@userlogout');

Route::get('/home', 'HomeController@index');


Route::get('auth/logout', 'Auth\AuthController@logout');

Route::get('/post', 'PostController@index');


Route::get('/', 'LoginhomeController@index');