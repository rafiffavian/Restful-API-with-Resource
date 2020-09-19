<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'Api\RegisterController@action');
Route::post('login', 'Api\LoginController@action');
Route::get('me', 'Api\UserController@me')->middleware('auth:api');
Route::post('quote', 'Api\QuoteController@store')->middleware('auth:api');