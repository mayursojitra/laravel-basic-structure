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

Auth::routes(['verify' => true]);

Route::group(['prefix'=>'sdadmin'],function(){
    //adminlogin controller routes
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    //admincontroller routes
    Route::get('/','AdminController@index')->name('admin.dashboard');

    // admin user profile controller routes
    Route::group(['prefix'=>'users'],function(){
        Route::get('/get','UserController@get_user')->name('admin.user.get');
        Route::get('/create','UserController@create')->name('admin.user.create');
        Route::post('/store','UserController@store')->name('admin.user.store');
        Route::get('/edit/{id}','UserController@edit')->name('admin.user.edit');
        Route::get('/edit/status/{id}','UserController@edit_status')->name('admin.user.status.edit');
        Route::post('/update/{id}','UserController@update')->name('admin.user.update');
        Route::get('/destroy/{id}','UserController@destroy')->name('admin.user.destroy');
        Route::get('/', 'UserController@index')->name('admin.user.index');
    });
});