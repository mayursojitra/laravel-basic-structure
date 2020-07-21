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

Route::group(['prefix' => 'edu','namespace'=>'Api'], function() {
    
    Route::post('/login','UserController@login');
    Route::post('/register','UserController@register');
    Route::post('/verify','UserController@verifyUser');
    Route::post('/forgot_password','UserController@forgotPassword');
    Route::post('/reset_password','UserController@resetPassword');

    Route::group(['middleware' => 'authapi:api'], function() {
       
    });
});