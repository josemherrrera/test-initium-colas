@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><?= __('Home'); ?></a></li>
    <li class="breadcrumb-item active"><a href="{{ route('ticket.index'); }}"><?= __('Tickets'); ?></a></li>
</nav>

<h1>Tickets</h1>

<a class="btn btn-success mt-3 mb-3" href="{{ route('ticket.create')}}"><?= __('Create'); ?></a>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <td>Id</td>
      <td><?= __('Identification'); ?></td>
      <td><?= __('Name'); ?></td>
      <td><?= __('Sequence'); ?></td>
      <td><?= __('Queue'); ?></td>
      <td><?= __('Status'); ?></td>
      <td><?= __('Created'); ?></td>
      <td><?= __('Updated'); ?></td>
      <td><?= __('Actions'); ?></td>
    </tr>
  </thead>
  <tbody>
    @foreach ($tickets as $ticket)
    <tr>
      <?php 
      $queue = $ticket->queue->first(); 
      ?>
      <td>{{ $ticket->id }}</td>
      <td>{{ $ticket->identification }}</td>
      <td>{{ $ticket->name }}</td>
      <td>{{ $ticket->sequence }}</td>
      <td>{{ isset($queue) ? $queue->name : __('None') }}</td>
      <td>{{ isset($queue) ? __('Open') : __('Closed') }}</td>
      <td>{{ $ticket->created_at->format('d-m-Y h:i a') }}</td>
      <td>{{ $ticket->updated_at->format('d-m-Y h:i a') }}</td>
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

{{ $tickets->links() }}

@endsection
