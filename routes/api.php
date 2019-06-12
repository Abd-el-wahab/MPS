<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('clients' , 'ClientController@index');
// List Single client
Route::get('client/{id}' , 'ClientController@show');
// Create client
Route::post('create' , 'ClientController@store');
// Delete client
Route::delete('client/{id}' , 'ClientController@destroy');
// client Login
Route::post('logincheck' , 'ClientController@clientlogin');
// client logout
Route::get('/logout', 'ClientController@logout');



Route::get('/signup', 'ClientController@signup');
Route::get('/login', 'ClientController@login');


