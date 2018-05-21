<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contain','PageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
    Route::get('web-login', 'Auth\AuthController@webLogin');
    Route::post('web-login', ['as'=>'web-login','uses'=>'Auth\AuthController@webLoginPost']);
    Route::get('admin-login', 'AdminAuth\AuthController@adminLogin');
    Route::post('admin-login', ['as'=>'admin-login','uses'=>'AdminAuth\AuthController@adminLoginPost']);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
