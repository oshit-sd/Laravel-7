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

Route::get('/home',             'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('/todo',                'TodoController');
    Route::put('/todo/{todo}/complete',     'TodoController@complete')->name('todo.complete');
    Route::put('/todo/{todo}/incomplete',   'TodoController@incomplete')->name('todo.incomplete');
    // Route::get('/todoSlug/{todo:title}',    'TodoController@show');
    // Route::get('/todoSlug/{todo}',    'TodoController@show'); //model route key name

    Route::post('/avatar-upload',       'UserController@uploadAvatar')->name('avatar.upload');
});
