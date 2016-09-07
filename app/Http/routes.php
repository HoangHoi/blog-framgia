<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::auth();
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::group(['middleware' => 'auth'], function() {
    Route::resource('entry', 'EntryController', ['only' => [
            'index', 'store', 'update', 'destroy'
    ]]);
    Route::post('follow', ['uses' => 'UserController@follow', 'as' => 'user.follow']);
    Route::post('entry/comment', ['uses' => 'EntryController@comment', 'as' => 'entry.comment']);
    Route::post('entry/publish', ['uses' => 'EntryController@publish', 'as' => 'entry.publish']);
});
Route::resource('entry', 'EntryController', [
    'only' => ['show']
]);
Route::get('/{id}', ['uses' => 'UserController@showEntries', 'as' => 'user.showEntries']);
Route::get('category/{id?}', ['uses' => 'CategoryController@show', 'as' => 'category.show']);
