<!-- resources/views/includes/head.blade.php -->

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="{{ csrf_token() }}" name="csrf-token">

  <title>{{ config('app.name', 'Guzanet') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net" rel="preconnect">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script> --}}
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/css/tablas.css', 'resources/js/app.js', 'resources/js/dark-mode.js'])
  <!-- Styles -->
  @livewireStyles
  @powerGridStyles
</head>
