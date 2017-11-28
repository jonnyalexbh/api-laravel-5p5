<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LanguageUserTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('language_user', function (Blueprint $table) {
      $table->string('language_id', 4);
      $table->integer('user_id')->unsigned();
      $table->string('lang_level_write_id', 4);
      $table->string('lang_level_speak_id', 4);
      $table->string('lang_level_listen_id', 4);
      $table->string('lang_level_read_id', 4);
      $table->timestamps();

      $table->foreign('language_id')->references('id')->on('languages');
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('lang_level_write_id')->references('id')->on('lang_levels');
      $table->foreign('lang_level_speak_id')->references('id')->on('lang_levels');
      $table->foreign('lang_level_listen_id')->references('id')->on('lang_levels');
      $table->foreign('lang_level_read_id')->references('id')->on('lang_levels');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('language_user');
  }
}
