<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="{{ csrf_token() }}" name="csrf-token">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net" rel="preconnect">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="font-roboto flex h-screen bg-slate-200" x-data="{ sidebarOpen: false }">
    @include('layouts.navigation')

    <div class="flex flex-1 flex-col overflow-hidden">
      @include('includes.header')

      <main class="flex-1 overflow-y-auto overflow-x-hidden bg-slate-200">
        <div class="container mx-auto px-6 py-8">
          @if (isset($header))
            <h3 class="mb-4 text-3xl font-medium text-gray-700">
              {{ $header }}
            </h3>
          @endif

          {{ $slot }}
        </div>
      </main>
    </div>
  </div>
  <!-- Scripts -->
  @livewireScripts
  @powerGridScripts
</body>

</html>
