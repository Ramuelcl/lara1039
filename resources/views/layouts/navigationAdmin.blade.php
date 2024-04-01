<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
     class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
     class="fixed inset-y-0 left-0 z-30 w-64 transform overflow-y-auto bg-gray-900 transition duration-300 lg:static lg:inset-0 lg:translate-x-0">
  <div class="mt-8 flex items-center justify-center">
    <div class="flex items-center">
      <img alt="Log" class="h-10" src="{{ config('app_settings.logo') }}">
      <span class="ml-2 text-2xl text-gray-100">{{ __(config('app_settings.nombreEmpresa') ?? 'Guza') }}</span>
    </div>
  </div>

  <nav class="ml-20 inline" x-data="{ isMultiLevelMenuOpen: false }">
    {{-- @livewire('livemenu', ['dashboard', false]) --}}

    <x-nav-link :active="request()->routeIs('admin.users.index')" href="{{ route('admin.users.index') }}">
      <x-slot name="icon">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
          <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
      </x-slot>
      {{ __('List of Users') }}
    </x-nav-link>

    <x-nav-link :active="request()->routeIs('admin.users.listar')" href="{{ route('admin.users.listar') }}">
      <x-slot name="icon">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
          <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
      </x-slot>
      {{ __('Lista Users livewire') }}
    </x-nav-link>

    <x-nav-link :active="request()->routeIs('admin.roles.index')" href="{{ route('admin.roles.index') }}">
      <x-slot name="icon">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
          <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
      </x-slot>
      {{ __('List of Roles') }}
    </x-nav-link>

    {{-- <x-nav-link :active="request()->routeIs('admin.users.input')" href="{{ route('admin.users.input') }}">
      <x-slot name="icon">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
          <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
      </x-slot>
      {{ __('prueba Input Tabla') }}
    </x-nav-link> --}}
  </nav>
</div>
