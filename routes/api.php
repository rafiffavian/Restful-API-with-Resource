<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'Api\RegisterController@action');
Route::post('login', 'Api\LoginController@action');
Route::get('me', 'Api\UserController@me')->middleware('auth:api');
Route::post('quote', 'Api\QuoteController@store')->middleware('auth:api');
Route::get('quote/getdata', 'Api\QuoteController@index')->middleware('auth:api');
Route::get('quote/getdata/detail/{quote}', 'Api\QuoteController@show')->middleware('auth:api');
Route::put('quote/getdata/update/{quote}', 'Api\QuoteController@update')->middleware('auth:api');
Route::delete('quote/getdata/delete/{quote}', 'Api\QuoteController@destroy')->middleware('auth:api');