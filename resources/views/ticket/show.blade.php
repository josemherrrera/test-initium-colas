@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('queue.index'); }}"><?= __('Home'); ?></a></li>
    <li class="breadcrumb-item"><a href="{{ route('ticket.index'); }}"><?= __('Tickets'); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?= $ticket->sequence; ?></li>
  </ol>
</nav>

<h4>Ticket <?= $ticket->sequence; ?></h4>

<div class="row mb-3">
  <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="delete">
    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-sm btn-outline-primary"><span class="fas fa-edit"></span></a>
    <button type="submit" class="btn btn-sm btn-outline-danger"><span class="fas fa-trash"></span></button>
  </form>
</div>

<div class="form-group">
    <label for="identification">Identificación</label>
    <input readonly class="form-control" type="text" name="identification" id="identification" value="{{ $ticket->identification }}">
</div>

<div class="form-group">
    <label for="name">Nombre</label>
    <input readonly class="form-control" type="text" name="name" id="name" value="{{ $ticket->name }}">
</div>

<div class="form-group">
    <label for="sequence">Secuencia</label>
    <input readonly class="form-control" type="text" name="sequence" id="sequence" value="{{ $ticket->sequence }}"></input>
</div>

<?php 
  $queue = $ticket->queue->first(); 
?>

@isset($queue)
<div class="form-group">
    <label for="queue"><?= __('Queue'); ?></label>
    <input readonly class="form-control" type="text" name="queue" id="queue" value="{{ $queue->first()->name }}"></input>
</div>
@endisset

<div class="form-group">
    <label for="status"><?= __('Status'); ?></label>
    <input readonly class="form-control" type="text" name="status" id="status" value="{{ isset($queue) ? __('Open') : __('Closed') }}"></input>
</div>

@endsection

