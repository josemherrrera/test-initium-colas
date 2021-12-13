@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><?= __('Home'); ?></a></li>
    <li class="breadcrumb-item"><a href="{{ route('queue.index'); }}"><?= __('Queues'); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?= $record->name; ?></li>
  </ol>
</nav>

<h4><?= $record->name; ?></h4>

<div class="form-group">
    <label for="name"><?= __('Name'); ?></label>
    <input readonly class="form-control" type="text" name="name" id="name" value="{{ $record->name }}">
</div>

<div class="form-group">
    <label for="short_name"><?= __('Short name'); ?></label>
    <input readonly class="form-control" type="text" name="short_name" id="short_name" value="{{ $record->short_name }}">
</div>
@endsection

