<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
     class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
     class="fixed inset-y-0 left-0 z-30 w-64 transform overflow-y-auto bg-gray-900 transition duration-300 lg:static lg:inset-0 lg:translate-x-0">
  <div class="mt-8 flex items-center justify-center">
    <div class="flex items-center">
      <img alt="Logooo" class="h-10" src="{{ config('app_settings.logo') }}">
      <span class="ml-2 text-2xl text-gray-100">{{ __(config('app_settings.nombreEmpresa') ?? 'Guza') }}</span>
    </div>
  </div>

  <nav class="mt-10" x-data="{ isMultiLevelMenuOpen: false }">
    @livewire('livemenu', ['banca', false])
  </nav>
</div>
