<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('work_experiences', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->string('sector_job_id', 4);
      $table->string('area_job_id', 4);
      $table->string('job_title', 62);
      $table->string('company', 62);
      $table->date('dt_start');
      $table->date('dt_end');
      $table->longText('comment');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('sector_job_id')->references('id')->on('sector_jobs');
      $table->foreign('area_job_id')->references('id')->on('area_jobs');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('work_experiences');
  }
}
