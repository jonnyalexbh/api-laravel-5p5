<?php

use App\Tp_doc;
use App\Gender;
use App\Geo_div;
use App\Countrie;
use App\Marital_status;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
  static $password;

  return [
    'identification' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'password' => $password ?: $password = bcrypt('secret'),
    'gender_id' => Gender::all()->random()->id,
    'marital_status_id' => Marital_status::all()->random()->id,
    'tp_doc_id' => Tp_doc::all()->random()->id,
    'country_id' => Countrie::all()->random()->id,
    'geo_div_id' => Geo_div::all()->random()->id,
    'remember_token' => str_random(10),
    'api_token' => str_random(10),
  ];
});
