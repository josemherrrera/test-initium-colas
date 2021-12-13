@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('queue.index'); }}"><?= __('Home'); ?></a></li>
    <li class="breadcrumb-item active"><a href="{{ route('queue.index'); }}"><?= __('Queues'); ?></a></li>
</nav>

<h1><?= __('Queues'); ?></h1>

<a class="btn btn-success mt-3 mb-3" href="{{ route('ticket.create') }}"><?= __('Create ticket'); ?></a>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <td>Id</td>
      <td><?= __('Name'); ?></td>
      <td><?= __('Short Name'); ?></td>
      <td><?= __('Quantity'); ?></td>
      <td><?= __('Waiting time'); ?></td>
      <td><?= __('Actions'); ?></td>
    </tr>
  </thead>
  <tbody>
    @foreach ($queues as $queue)
    <tr>
      <td>{{ $queue->id }}</td>
      <td>{{ $queue->name }}</td>
      <td>{{ $queue->short_name }}</td>
      <td>{{ $queue->tickets->where('pivot.status', 'pending')->count() }}</td>
      <td>{{ $queue->tickets->where('pivot.status', 'pending')->count() * $queue->time }}</td>
      <td>
        <a href="{{ route('queue.tickets', $queue->id) }}" class="btn btn-sm btn-outline-info"><span class="fas fa-eye"></span></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $queues->links() }}

@endsection
