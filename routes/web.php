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
Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::get('/messages', 'MessagesController@getMessages');
Route::get('/albums','AlbumsController@index');
Route::get('/albums/create','AlbumsController@create');
Route::get('/albums/{id}','AlbumsController@show');
Route::get('/photos/create/{id}','PhotosController@create');
Route::get('/photos/{id}','PhotosController@show');

Route::delete('/photos/{id}','PhotosController@destroy');

Route::post('/contact/submit', 'MessagesController@submit');
Route::post('/albums/store','AlbumsController@store');
Route::post('/photos/store','PhotosController@store');