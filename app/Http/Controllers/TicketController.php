<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TicketController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tickets = Ticket::paginate();

    return view('ticket.index', ['tickets' => $tickets]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view(
      'ticket.form',
      [
        'record'      => new Ticket(),
        'queues'      => Queue::all(),
        'name'        => __('Add :singular', ['singular' => __('Ticket')]),
        'submit_url'  => route('ticket.store')
      ]
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreTicketRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // validate request data.
    $attributes = $request->validate([
      'identification'  => 'required|string|max:255',
      'name'            => 'required|string|max:255',
      'sequence'        => 'nullable|string|max:255',
      'queue'           => 'required|integer',
    ]);

    $ticket_data = Arr::except($attributes, ['queue']); 

    // create ticket
    $ticket = new Ticket($ticket_data);

    // gets the queue
    $queue = Queue::findOrFail($attributes['queue']);

    // get position to push in queue
    $position = $queue->tickets()->max('position') + 1;

    // assign sequenceto ticket
    $ticket->sequence = "$queue->short_name-$position";

    // save ticket data.
    $ticket->save();

    // attach ticket relation
    $queue->tickets()->attach([$ticket->id => ['status' => 'pending', 'position' => $position]]);

    return redirect()->route('ticket.show', $ticket)->with('status', 'Ticket creado con éxito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ticket  $ticket
   * @return \Illuminate\Http\Response
   */
  public function show(Ticket $ticket)
  {
    return view('ticket.show', ['ticket' => $ticket]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ticket  $ticket
   * @return \Illuminate\Http\Response
   */
  public function edit(Ticket $ticket)
  {
    return view(
      'ticket.form',
      [
        'record'     => $ticket,
        'queues'      => Queue::all(),
        'name'       => __('Edit :singular', ['singular' => __('Ticket')]),
        'submit_url' => route('ticket.update', $ticket)
      ]
    );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateTicketRequest  $request
   * @param  \App\Models\Ticket  $ticket
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Ticket $ticket)
  {
    // validate request data.
    $attributes = $request->validate([
      'identification'  => 'required|string|max:255',
      'name'            => 'required|string|max:255',
      'sequence'        => 'nullable|string|max:255',
      'queue'           => 'required|integer',
    ]);

    $ticket_data = Arr::except($attributes, ['queue']); 

    //update ticket
    $ticket->update($ticket_data);

    // gets the queue
    $queue = Queue::findOrFail($attributes['queue']);

    // sync queue relation
    $ticket->queue()->sync([$queue->id => ['status' => 'pending']]);

    return redirect()->route('ticket.show', $ticket)->with('status', 'Ticket actualizado con éxito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ticket  $ticket
   * @return \Illuminate\Http\Response
   */
  public function destroy(Ticket $ticket)
  {
    $ticket->delete();

    return back()->with('status', 'Ticket eliminado con éxito');
  }
}
