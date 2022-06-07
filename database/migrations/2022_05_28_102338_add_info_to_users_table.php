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
    Schema::table('users', function (Blueprint $table) {
      $table->string('country')->nullable();
      $table->string('city')->nullable();
      $table->string('street')->nullable();
      $table->unsignedMediumInteger('zipcode')->length(5)->nullable();
      $table->integer('bus')->nullable();
      $table->bigInteger('phonenumber')->nullable();
      $table->string('role')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn(['country', 'city', 'street', 'zipcode', 'bus', 'phonenumber', 'role']);
    });
  }
};
