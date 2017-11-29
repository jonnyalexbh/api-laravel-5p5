<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('genders')->insert([
      'id' => 1,
      'name' => 'Hombre'
    ]);

    DB::table('genders')->insert([
      'id' => 2,
      'name' => 'Mujer'
    ]);

  }
}
