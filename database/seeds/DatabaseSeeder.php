<?php

use App\Gender;
use App\Countrie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);

    DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    Countrie::truncate();
    Gender::truncate();

    $numberOfCountries = 20;
    $numberGenders = 2;

    factory(Countrie::class, $numberOfCountries)->create();
    factory(Gender::class, $numberGenders)->create();

  }
}
