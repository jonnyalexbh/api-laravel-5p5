<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('identification', 15);
      $table->string('first_name', 50);
      $table->string('second_name', 50);
      $table->string('first_sur_name', 50);
      $table->string('second_sur_name', 50);
      $table->date('dt_birth');
      $table->string('phone', 20);
      $table->string('mobile', 20);
      $table->string('email')->unique();
      $table->boolean('is_active');
      $table->string('password');
      $table->string('api_token', 60)->unique();
      $table->string('gender_id', 1);
      $table->string('marital_status_id', 2);
      $table->string('tp_doc_id', 10);
      $table->string('country_id', 4);
      $table->string('geo_div_id', 4);
      $table->rememberToken();
      $table->timestamps();

      $table->foreign('gender_id')->references('id')->on('genders');
      $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
      $table->foreign('tp_doc_id')->references('id')->on('tp_docs');
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
    Schema::dropIfExists('users');
  }
}
