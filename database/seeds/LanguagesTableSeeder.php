<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LanguagesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('languages')->insert(array(
      array(
        'id' => '01',
        'name' => 'Español',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ),
      array(
        'id' => '02',
        'name' => 'Ingles',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ),
      array(
        'id' => '03',
        'name' => 'Portugués',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ),
      array(
        'id' => '04',
        'name' => 'Alemán',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ),
      array(
        'id' => '05',
        'name' => 'Frances',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ),
      array(
        'id' => '06',
        'name' => 'Italiano',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ),
      array(
        'id' => '07',
        'name' => 'Ruso',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ),
      array(
        'id' => '08',
        'name' => 'Mandarín',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ),
      array(
        'id' => '09',
        'name' => 'Árabe',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      )


    ));

  }
}
