<?php
// Route::get('/', function () {
//     return view('welcome');
// });


// comment section
Route::resource('/comment',                 'CommentController');


Auth::routes();
Route::get('/home',                         'HomeController@index')->name('home');
// after login access this page (auth)
Route::middleware('auth')->group(function () {
    // todo section
    Route::resource('/todo',                'TodoController');
    Route::put('/todo/{todo}/complete',     'TodoController@complete')->name('todo.complete');
    Route::put('/todo/{todo}/incomplete',   'TodoController@incomplete')->name('todo.incomplete');
    Route::get('/todoSlug/{todo:title}',    'TodoController@show');
    Route::get('/todoSlug/{todo}',          'TodoController@show'); //model route key name
    // user section
    Route::post('/avatar-upload',       '   UserController@uploadAvatar')->name('avatar.upload');
});


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});
