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
  return 'Home';
});

Route::get('/users', function () {
  return 'Users';
});

Route::get('/users/{id}', function ($id) {
  return "Showing user detail: {$id}";
})->where('id', '[0-9]+');

Route::get('/users/new', function () {
  return 'create new user';
});

Route::get('/greeting/{name}/{nickname?}', function ($name, $nickname = null) {
  $name = ucfirst($name);

  if ($nickname) {
    return "Welcome {$name}, your nickname is {$nickname}";
  } else {
    return "Welcome {$name}";
  }
});
