<?php

use App\Countrie;
use Faker\Generator as Faker;

/**
* Countrie
*
*/
$factory->define(Countrie::class, function (Faker $faker) {
  return [
    'id' => $faker->unique()->randomNumber(4),
    'name' => $faker->country(),
  ];
});
/**
* Geo_div
*
*/
$factory->define(App\Geo_div::class, function (Faker $faker) {
  return [
    'id' => $faker->unique()->randomNumber(4),
    'country_id' => Countrie::all()->random()->id,
    'name' => $faker->country(),
  ];
});
