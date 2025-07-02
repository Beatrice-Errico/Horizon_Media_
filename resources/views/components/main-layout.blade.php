<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>{{env('APP_NAME')}} - {{$title}}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- 👇 Qui inserisci gli stili aggiuntivi --}}
  @stack('styles')
</head>
<body>

  <x-shared.nav-bar />

  {{-- 👇 Qui c'è il contenuto delle pagine --}}
  {{$slot}}

  <x-shared.footer />

  {{-- 👇 Qui gli script JS aggiuntivi --}}
  @stack('scripts')

</body>
</html>
