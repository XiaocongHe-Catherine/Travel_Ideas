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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('ideas', 'IdeaController')->middleware('auth');


/*Route::get('/search','SearchController@search')->name('search')->middleware('auth');*/
Route::get('/search','IdeaController@search')->name('search')->middleware('auth');

Route::post('/delete','IdeaController@destroy')->name('delete')->middleware('auth');

Route::post('/chat2','IdeaController@chat2')->name('chat2')->middleware('auth');
Route::post('message/store','IdeaController@messageStore')->name('message.store')->middleware('auth');




Route::get('message/get-all/{id}','IdeaController@getAll')->middleware('auth');

