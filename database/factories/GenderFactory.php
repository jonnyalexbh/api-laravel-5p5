<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement();

$factory->define(App\Gender::class, function (Faker $faker) use ($autoIncrement) {
  $autoIncrement->next();
  return [
    'id' => $autoIncrement->current(),
    'name' => $faker->unique()->randomElement(['Hombre', 'Mujer']),
  ];
});


/* autoIncrement */
function autoIncrement()
{
  for ($i = 0; $i < 1000; $i++) {
    yield $i;
  }
}
