@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><?= __('Home'); ?></a></li>
    <li class="breadcrumb-item"><a href="{{ route('ticket.index'); }}"><?= __('Tickets'); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?= $name; ?></li>
  </ol>
</nav>

<h4><?= $name; ?></h4>

<form method="post" action="<?= $submit_url; ?>">
  @csrf
  <?php if ($record->exists): ?>
    <input type="hidden" name="_method" value="put">
  <?php endif; ?>
  <div class="mb-3">
    <label for="identification" class="form-label">Identificación</label>
    <input class="form-control" type="text" name="identification" id="identification" value="{{ old('identification', $record->identification) }}">

    @error('identification')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $record->name) }}">

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="queue" class="form-label"><?= __('Queue'); ?></label>
    <select name="queue" class="form-select" >
      @foreach ($queues as $queue)
        <option value="<?= $queue->id; ?>"><?= $queue->name; ?></option>
      @endforeach
    </select>
  </div>

  <input type="submit" value="Enviar" class="btn btn-primary">
</form>
@endsection