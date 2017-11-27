<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoDivsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('geo_divs', function (Blueprint $table) {
      $table->string('id', 4);
      $table->string('country_id', 4);
      $table->string('name', 62);
      $table->timestamps();

      $table->primary('id');
      $table->foreign('country_id')->references('id')->on('countries');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('geo_divs');
  }
}
