<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('queues', function (Blueprint $table) {
      $table->id();
      $table->string('name', 50)->unique();
      $table->string('short_name', 10)->unique();
      $table->boolean('is_active');
      $table->tinyInteger('time');
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
    Schema::dropIfExists('queues');
  }
}
