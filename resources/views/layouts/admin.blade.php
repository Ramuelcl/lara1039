<!DOCTYPE html>
<!-- resources/views/layouts/admin.blade.php -->
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes.head') <!-- Incluir el head -->

<body>
  <div class="font-roboto flex h-screen bg-slate-200" x-data="{ sidebarOpen: false }">

    @include('layouts.navigationAdmin')

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
