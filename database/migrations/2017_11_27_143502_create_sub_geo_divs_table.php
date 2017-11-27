<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubGeoDivsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('sub_geo_divs', function (Blueprint $table) {
      $table->string('id', 8);
      $table->string('country_id', 4);
      $table->string('geo_div_id', 4);
      $table->string('name', 62);
      $table->timestamps();

      $table->primary('id');
      $table->foreign('country_id')->references('id')->on('countries');
      $table->foreign('geo_div_id')->references('id')->on('geo_divs');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('sub_geo_divs');
  }
}
