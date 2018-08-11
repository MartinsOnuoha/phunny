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

Route::get('/phones', function () {
	return view('phonebook');
});

Route::get('/phonebook/list', 'PhonebookController@list');
Route::resource('phonebook', 'PhonebookController');

Route::get('/phonebook/{name}', function () {
	return redirect('/');
})->where('name', '[A-Za-z]+');
