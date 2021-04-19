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


// Route for the user to post a new message
Route::post('message/store','IdeaController@messageStore')->name('message.store')->middleware('auth');


// Route to get all messages that have been posted for a given idea id
Route::get('message/get-all/{id}','IdeaController@getAll')->middleware('auth');

