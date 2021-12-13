<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')
    
    <title>Atención al cliente</title>
  </head>
  <body>
    @include('partials.nav-header-main')
    <div class="container">
      @yield('content')
    </div>
  </body>
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('js')
</html>