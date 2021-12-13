<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QueueSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    \DB::table('queues')->insert([
      'name'        => 'Cola 1',
      'short_name'  => 'C1',
      'is_active'   =>  1,
      'time'        =>  2,
      'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at'  => Carbon::now()->format('Y-m-d H:i:s') 
    ]);

    \DB::table('queues')->insert([
      'name'        => 'Cola 2',
      'short_name'  => 'C2',
      'is_active'   =>  1,
      'time'        =>  3,
      'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at'  => Carbon::now()->format('Y-m-d H:i:s') 
    ]);
  }
}
