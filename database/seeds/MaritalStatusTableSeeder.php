<?php

use Illuminate\Database\Seeder;
use App\Marital_status;

class MaritalStatusTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {

    $data = [
      [
        'id' => '1',
        'name' => 'Soltero'
      ],
      [
        'id' => '2',
        'name' => 'Casado'
      ]
    ];

    foreach ($data as $value) {
      Marital_status::create($value);
    }
  }

}
