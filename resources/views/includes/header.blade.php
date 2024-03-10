<header class="flex items-center justify-between border-b-4 border-indigo-600 bg-white px-6 py-4">
  <div class="flex items-center">
    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 6H20M4 12H20M4 18H11" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              stroke="currentColor" />
      </svg>
    </button>
  </div>
  {{-- menu principal --}}
  @livewire('livemenu')
  <div class="flex items-center">
    <x-dropdown>
      <x-slot name="trigger">
        <button @click="dropdownOpen = ! dropdownOpen" class="relative block overflow-hidden">
          {{ Auth::user()->name }}
        </button>
      </x-slot>

      <x-slot name="content">
        <x-dropdown-link href="{{ route('profile.edit') }}">
          {{ __('Profile') }}
        </x-dropdown-link>

        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <x-dropdown-link href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log out') }}
          </x-dropdown-link>
        </form>
      </x-slot>
    </x-dropdown>
  </div>
</header>
