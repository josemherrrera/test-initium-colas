<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsQueuesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tickets_queues', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('ticket_id')->unsigned();
      $table->bigInteger('queue_id')->unsigned();
      $table->Integer('position');
      $table->string('status')->default('pending');

      // adds the indexes
      $table->index(['ticket_id', 'queue_id'], "idx_{$table->getTable()}_tickets_queues");

      // adds the foreign keys
      $table->foreign(['ticket_id'], "fk_{$table->getTable()}_tickets")
        ->references('id')->on('tickets')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign(['queue_id'], "fk_{$table->getTable()}_queues")
        ->references('id')->on('queues')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('tickets_queues');
  }
}
