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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/api/me', 'ApiUsersController@me');
Route::get('/api/users', 'ApiUsersController@listUsers');
Route::get('/api/messages/with/{user}', 'ApiMessagesController@listMessages');
Route::post('/api/messages/to/{user}', 'ApiMessagesController@createMessage');
