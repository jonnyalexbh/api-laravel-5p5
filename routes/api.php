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
* countries api token authentication
*/
Route::group(['middleware' => 'auth:api'], function () {
  Route::resource('countries', 'CountrieController', ['only' => ['index', 'show']]);
});

/**
* countries auth.basic
*/
Route::group(['middleware' => 'auth.basic'], function () {
  Route::resource('countries-basic', 'CountrieController', ['only' => ['index', 'show']]);
});
