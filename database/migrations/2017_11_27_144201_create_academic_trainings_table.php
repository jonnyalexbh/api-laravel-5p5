<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicTrainingsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('academic_trainings', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->string('training_center_id', 11);
      $table->string('level_studie_id', 4);
      $table->string('study_area_id', 8);
      $table->date('dt_start');
      $table->date('dt_end');
      $table->boolean('state');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('training_center_id')->references('id')->on('training_centers');
      $table->foreign('level_studie_id')->references('id')->on('level_studies');
      $table->foreign('study_area_id')->references('id')->on('study_areas');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('academic_trainings');
  }
}
