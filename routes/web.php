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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'BusinessController@store')->name('addtransaction');
Route::get('/home/{id}', 'BusinessController@destroy');
Route::get('/view/{id}', 'BusinessController@show');
Route::get('/edit/{id}', 'BusinessController@edit')->name('edit');
Route::post('/edit/{id}', 'BusinessController@update')->name('update');