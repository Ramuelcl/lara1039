<!-- Contenido del archivo header.blade.php -->
<header class="h-12 bg-gray-200 dark:bg-gray-700">
  <nav :class="{
      'shadow-gray-600 dark:shadow-gray-100 bg-gray-100 dark:bg-gray-800': isOpen,
      'shadow-gray-600 dark:shadow-gray-100 bg-gray-100 dark:bg-gray-800': !
          isOpen
  }"
       @keydown.escape="isOpen = false" class="fixed top-0 z-10 flex h-12 w-full flex-wrap items-center justify-between"
       x-data="{ isOpen: false }">
    <!--Logo etc-->
    <div class="mr-6 flex flex-shrink-0 items-center text-gray-200 dark:text-gray-800">
      <a class="mx-4" href="{{ route('Home') }}">
        <x-application-logo />
      </a>
      <a class="text-gray-800 no-underline hover:text-gray-400 hover:no-underline dark:text-gray-200 hover:dark:text-gray-400"
         href="{{ route('Home') }}">
        @php
          $nombreEmpresa = config('app_settings.nombreEmpresa');
        @endphp
        <span class="ml-2">{{ __($nombreEmpresa ?? 'Guzanet') }}</span>
      </a>
    </div>

    <!--Toggle button (hidden on large screens)-->
    <button :class="{ 'transition transform-180': isOpen }" @click="isOpen = !isOpen"
            class="block px-2 text-gray-200 hover:text-gray-400 focus:text-gray-200 focus:outline-none dark:text-gray-800 hover:dark:text-gray-400 focus:dark:text-gray-800 lg:hidden"
            id='theme-toggle-dark-icon' type="button">
      <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd"
              d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
              fill-rule="evenodd" x-show="isOpen" />
        <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
              fill-rule="evenodd" x-show="!isOpen" />
      </svg>
    </button>

    <!--Menu-->

    <div :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false"
         class="w-full flex-grow lg:flex lg:w-auto lg:items-center" x-show.transition="true">
      {{-- menu --}}
      <ul class="list-reset mx-4 flex-1 items-center justify-end pt-6 lg:flex lg:pt-0">
        @livewire('livemenu')

        {{-- Login / usuario-logout --}}
        <!-- Right Side Of Navbar -->

        <!-- button Dark/light -->
        <button class="mx-2 rounded-lg p-2.5 text-sm text-blue-500 hover:bg-blue-300 focus:outline-none focus:ring-1 focus:ring-red-200 dark:text-red-500 dark:hover:bg-red-300 dark:focus:ring-blue-700"
                data-tooltip-target="tooltip-toggle" id="theme-toggle" type="button">
          <svg class="hidden h-5 w-5" fill="none" id="theme-toggle-dark-icon" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" fill="currentColor">
            </path>
          </svg>
          <svg class="hidden h-5 w-5" fill="none" id="theme-toggle-light-icon" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd"
                  d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                  fill-rule="evenodd" fill="currentColor"></path>
          </svg>
        </button>

        <!-- Authentication Links -->
        @guest
          @if (Route::has('login'))
            <li class="mr-3">
              <x-nav-link :active="request()->routeIs('login')" :href="route('login')">{{ __('Login') }}
              </x-nav-link>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="mr-3">
              <x-nav-link :active="request()->routeIs('register')" :href="route('register')">{{ __('Register') }}
              </x-nav-link>
            </li>
          @endif
        @else
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <div class="flex justify-between">

                <button
                        class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                  <div>{{ Auth::user()->name ?? 'Usuario' }}</div>

                  <div class="ms-1">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path clip-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            fill-rule="evenodd" />
                    </svg>
                  </div>
                </button>
              </div>
            </x-slot>
            <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <form action="{{ route('logout') }}" method="POST">
                @csrf

                <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        @endguest
      </ul>
    </div>
  </nav>
</header>
