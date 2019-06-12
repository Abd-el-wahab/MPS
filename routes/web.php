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





Route::get('clients' , 'ClientController@index');
// List Single client
Route::get('client/{id}' , 'ClientController@show');
// Create client
Route::post('create' , 'ClientController@store');
// Delete client
Route::delete('client/{id}' , 'ClientController@destroy');
// client Login
Route::post('login' , 'ClientController@clientlogin');
// client logout
Route::get('/logout', 'ClientController@logout');
