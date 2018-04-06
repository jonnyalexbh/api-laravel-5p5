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

/**
* simple login
*/
Route::post('login-simple', 'Api\Auth\LoginController@loginSimple');

Route::group(['middleware' => 'auth:api'], function(){
  Route::post('details-simple', 'Api\Auth\LoginController@detailsSimple');
  Route::post('logout-simple', 'Api\Auth\LoginController@logoutSimple');
});

/**
* login
*/
Route::post('login', 'Api\Auth\LoginController@login');
Route::post('refresh', 'Api\Auth\LoginController@refresh');
Route::group(['middleware' => 'auth:api'], function () {
  Route::post('logout', 'Api\Auth\LoginController@logout');
});

/**
* countries api token authentication
*/
Route::group(['middleware' => 'auth:api'], function () {
  Route::resource('countries-token', 'Api\CountrieController', ['only' => ['index', 'show']]);
});

/**
* countries auth.basic
*/
Route::group(['middleware' => 'auth.basic'], function () {
  Route::resource('countries-basic', 'Api\CountrieController', ['only' => ['index', 'show']]);
});

/**
* countries auth.basic.once
*/
Route::group(['middleware' => 'auth.basic.once'], function () {
  Route::resource('countries-basic-once', 'Api\CountrieController', ['only' => ['index', 'show', 'store']]);
});

/**
* countries passport
*/
Route::resource('countries', 'Api\CountrieController', ['only' => ['index', 'show', 'store']]);
Route::resource('countries-auth', 'Api\CountrieController', ['only' => ['index', 'show', 'store']]);

/**
* gender-users
*/
Route::resource('genders', 'Api\GenderController');

/**
* users
*/
Route::resource('users', 'Api\UserController', ['only' => ['index', 'show']]);

/**
* users-return
*/
Route::resource('users-return', 'Api\UserReturnController');
