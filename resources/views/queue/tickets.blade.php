@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('queue.index'); }}"><?= __('Home'); ?></a></li>
    <li class="breadcrumb-item"><a href="{{ route('queue.index'); }}"><?= __('Queues'); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?= $record->name; ?></li>
  </ol>
</nav>

<h1><?= $record->name; ?></h1>

<table class="table">
  <thead>
    <tr>
      <td><?= __('Ticket'); ?></td>
      <td><?= __('Identification'); ?></td>
      <td><?= __('Name'); ?></td>
      <td><?= __('Status'); ?></td>
      <td><?= __('Actions'); ?></td>
    </tr>
  </thead>
  <tbody>
    @foreach ($tickets as $ticket)
    <tr>
      <td>{{ $ticket->sequence }}</td>
      <td>{{ $ticket->identification }}</td>
      <td>{{ $ticket->name }}</td>
      <td>{{ __($ticket->pivot->status) }}</td>
      <td>
        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-sm btn-outline-info"><span class="fas fa-eye"></span></a>
          <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-sm btn-outline-primary"><span class="fas fa-edit"></span></a>
          <button type="submit" class="btn btn-sm btn-outline-danger"><span class="fas fa-trash"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

