<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8" />
      <link rel="stylesheet" href="{{ asset('assets/css/chunk-vendors.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
  </head>
  <body>
    <v-app v-cloak id="app">
      <div class="content">
          @yield('content')
      </div>
    </v-app>

  <script src="{{ asset('assets/js/chunk-vendors.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
  </body>
</html>


