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

Route::get('/login', function () {
    return view('login');
});

Route::get('/hello', function() {
    return 'Hello Laravel';
});

Route::group(['prefix' => 'user'], function () {

    // Matches The "/user/users" URL
    Route::get('/', 'UserController@index');

    Route::get('/profile', 'UserController@showProfile');

    Route::post('/login', 'UserController@login');

    Route::get('/profile/{id}', function ($id) {
        return $url = route('profile', ['id' => $id]);
    })->name('profile');
});

//Route::controller('user','UserController');

Route::group(['prefix' => 'keyin'], function () {
    Route::get('/', 'KeyinController@index');
    Route::get('/master/{table?}', 'KeyinController@showKeyinMaster');
});

Route::group(['prefix' => 'report'], function () {
    Route::get('/{id?}', 'ReportController@index');
    //Route::get('/{id}', 'ReportController@showReport')->name('report');
});


Route::get('/articles/create', 'ArticlesController@create'); // Create

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', 'ArticlesController@index');  // retrieve
    Route::get('/{id}', 'ArticlesController@show'); //retrieve
    Route::get('/create', 'ArticlesController@create'); // Create
    Route::post('/', 'ArticlesController@store'); // Insert
    Route::get('/{id}/edit', 'ArticlesController@edit'); //edit
    Route::put('/{id}', 'ArticlesController@update'); //update
    Route::delete('/{id}', 'ArticlesController@detroy'); //detroy
});
