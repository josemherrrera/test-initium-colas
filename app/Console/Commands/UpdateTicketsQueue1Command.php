<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Queue;

class UpdateTicketsQueue1Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:queue1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      // get the queue 1
      $queue = Queue::find(1);

      // get first ticket of queue 1
      $ticket = $queue->tickets->where('pivot.status', 'pending')->first();

      if (isset($ticket)) {
        $queue->tickets()->updateExistingPivot($ticket->id, ['status' => 'finished']);
      }
    }
}
