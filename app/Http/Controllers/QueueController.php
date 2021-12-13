<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $queues = queue::paginate();

    return view('queue.index', ['queues' => $queues]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view(
      'queue.form',
      [
        'record'     => new queue(),
        'name'       => __('Add :singular', ['singular' => __('Queue')]),
        'submit_url' => route('queue.store')
      ]
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // validate request data.
    $attributes = $request->validate([
      'name'        => 'required|string|max:50',
      'short_name'  => 'required|string|max:10',
      'is_active'   => 'required|boolean',
    ]); 

    // create queue
    $queue = new queue($attributes);

    // save queue data.
    $queue->save();

    return redirect()->route('queue.show', $queue)->with('status', 'queue creado con éxito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function show(Queue $queue)
  {
    return view('queue.show', ['record' => $queue]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function edit(Queue $queue)
  {
    return view(
      'queue.form',
      [
        'record'     => $queue,
        'name'       => __('Edit :singular', ['singular' => __('Queue')]),
        'submit_url' => route('queue.update', $queue)
      ]
    );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Queue $queue)
  {
    // validate request data.
    $attributes = $request->validate([
      'name'        => 'required|string|max:50',
      'short_name'  => 'required|string|max:10',
      'is_active'   => 'required|boolean',
    ]); 

    //update queue
    $queue->update($attributes);

    return redirect()->route('queue.show', $queue)->with('status', 'queue actualizado con éxito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function destroy(Queue $queue)
  {
    $queue->delete();

    return back()->with('status', 'queue eliminado con éxito');
  }

  /**
   * Display the queue's tickets.
   *
   * @param  \App\Models\Queue  $queue
   * @return \Illuminate\Http\Response
   */
  public function tickets(Queue $queue)
  {
    // get tickets with status 'finished'
    $finished_tickets = $queue->tickets->where('pivot.status', 'finished');

    // delete finished tickets
    foreach ($finished_tickets as $ticket_to_delete) {
      $queue->tickets()->detach($ticket_to_delete->id);
    }


    return view(
      'queue.tickets',
      [
        'record'      => $queue,
        'tickets'     => $queue->tickets->where('pivot.status', 'pending')
      ]
    );
  }
}
