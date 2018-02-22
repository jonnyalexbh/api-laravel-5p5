<?php

use App\User;
use App\Gender;
use App\Tp_doc;
use App\Countrie;
use App\Geo_div;
use App\Language;
use App\Marital_status;
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
    
    User::truncate();
    Countrie::truncate();
    Gender::truncate();
    Language::truncate();
    Marital_status::truncate();
    Tp_doc::truncate();
    
    // $this->call(UsersTableSeeder::class);
    $this->call(GendersTableSeeder::class);
    $this->call(LanguagesTableSeeder::class);
    $this->call([
      MaritalStatusTableSeeder::class,
      TpDocTableSeeder::class
    ]);
    
    $numberOfCountries = 10;
    $numberOfGeoDiv = 6;
    $numberOfUsers = 4;
    // $numberGenders = 2;
    
    factory(Countrie::class, $numberOfCountries)->create();
    factory(Geo_div::class, $numberOfGeoDiv)->create();
    factory(User::class, $numberOfUsers)->create();
    // factory(Gender::class, $numberGenders)->create();
    
  }
}