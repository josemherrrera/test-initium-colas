@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('queue.index'); }}"><?= __('Home'); ?></a></li>
    <li class="breadcrumb-item"><a href="{{ route('queue.index'); }}"><?= __('Queues'); ?></a></li>
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
    <label for="name" class="form-label"><?= __('Name'); ?></label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $record->name) }}">

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="short_name" class="form-label"><?= __('Short Name'); ?></label>
    <input class="form-control" type="text" name="short_name" id="short_name" value="{{ old('short_name', $record->short_name) }}">

    @error('short_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="is_active" class="form-label"><?= __('Active'); ?></label>
    <select name="is_active" class="form-select" >
      <option selected value="1"><?= __("Yes"); ?></option>
      <option value="0"><?= __("No"); ?></option>
    </select>
  </div>

  <input type="submit" value="Enviar" class="btn btn-primary">
</form>
@endsection