<?php

use App\Tp_doc;
use Illuminate\Database\Seeder;

class TpDocTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    Tp_doc::create([
      'id' => '1', 'name' => 'TI'
    ]);

    Tp_doc::create([
      'id' => '2', 'name' => 'CE'
    ]);
  }
}
