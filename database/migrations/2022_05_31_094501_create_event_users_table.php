<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('event_user', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedBigInteger('event_id')->index();
      $table->unsignedBigInteger('user_id')->index();

      $table->foreign('event_id')
        ->references('id')
        ->on('events')
        ->onDelete('cascade');

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

      $table->string('time');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('event_user');
  }
};
