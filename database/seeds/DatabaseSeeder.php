<?php

use App\Gender;
use App\Countrie;
use App\Language;
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

    DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    Countrie::truncate();
    Gender::truncate();
    Language::truncate();

    // $this->call(UsersTableSeeder::class);
    $this->call(GendersTableSeeder::class);
    $this->call(LanguagesTableSeeder::class);

    $numberOfCountries = 20;
    $numberGenders = 2;

    factory(Countrie::class, $numberOfCountries)->create();
    // factory(Gender::class, $numberGenders)->create();

  }
}
