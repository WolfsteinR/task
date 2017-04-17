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

Route::get('/', 'BookController@index');
Route::get('/create-author', function () {
    return view('form.create_author');
});
Route::get('/create-book', 'BookController@create_form');

Route::post('/create_author', 'AuthorController@create');
Route::post('/create_book', 'BookController@create');