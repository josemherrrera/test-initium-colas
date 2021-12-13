<?php
$current_url = url()->current(); 
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('queue.index'); }}">Sistema</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $current_url == route('ticket.index') ? 'active' : ''; ?>" href="{{ route('ticket.index') }}">Tickets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current_url == route('queue.index') ? 'active' : ''; ?>" href="{{ route('queue.index') }}"><?= __('Queues'); ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>