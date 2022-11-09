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

Route::prefix('posts')->name('posts')->group(function() {
    Route::get('/', 'PostsController@index');
    Route::get('/create', 'PostsController@create')->name('.create');
    Route::post('/create', 'PostsController@store')->name('.create');
    Route::get('/edit/{id}', 'PostsController@edit')->name('.edit');
    Route::post('/edit/{id}', 'PostsController@update')->name('.edit');
    Route::get('/show/{id}', 'PostsController@show')->name('.show');
    Route::get('/delete/{id}', 'PostsController@delete')->name('.delete');
    Route::get('/destroy/{id}', 'PostsController@destroy')->name('.destroy');
    Route::get('/restore/{id}', 'PostsController@restore')->name('.restore');

    Route::prefix('/comments')->name('.comments')->group(function (){
        Route::post('/create','CommentController@store')->name('.create');
    });
});
