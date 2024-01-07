<!-- Contenido del archivo header.blade.php -->
<header class="bg-gray-200 dark:bg-gray-700 h-12">
    <nav class="h-12 flex items-center justify-between flex-wrap fixed w-full z-10 top-0" x-data="{ isOpen: false }"
        @keydown.escape="isOpen = false"
        :class="{
            'shadow-gray-600 dark:shadow-gray-100 bg-gray-100 dark:bg-gray-800': isOpen,
            'shadow-gray-600 dark:shadow-gray-100 bg-gray-100 dark:bg-gray-800': !
                isOpen
        }">
        <!--Logo etc-->
        <div class="flex items-center flex-shrink-0 text-gray-200 dark:text-gray-800 mr-6">
            <a href="{{ route('Home') }}" class="mx-4">
                <x-application-logo />
            </a>
            <a class="text-gray-800 dark:text-gray-200 hover:text-gray-400 hover:dark:text-gray-400 no-underline hover:no-underline"
                href="{{ route('Home') }}">
                @php
                    $nombreEmpresa = config('app_settings.nombreEmpresa');
                @endphp
                <span class="ml-2">{{ __($nombreEmpresa ?? 'Guzanet') }}</span>
            </a>
        </div>

        <!--Toggle button (hidden on large screens)-->
        <button @click="isOpen = !isOpen" type="button" id='theme-toggle-dark-icon'
            class="block lg:hidden px-2 text-gray-200 dark:text-gray-800 hover:text-gray-400 hover:dark:text-gray-400 focus:outline-none focus:text-gray-200 focus:dark:text-gray-800"
            :class="{ 'transition transform-180': isOpen }">
            <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path x-show="isOpen" fill-rule="evenodd" clip-rule="evenodd"
                    d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
                <path x-show="!isOpen" fill-rule="evenodd"
                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
            </svg>
        </button>

        <!--Menu-->

        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
            :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false"
            x-show.transition="true">
            {{-- menu --}}
            <ul class="mx-4 pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center">
                @livewire('livemenu')
                {{-- @foreach ($menus as $menu)
                    <li class="mr-3">
                        <x-nav-link :href="route($menu['Route'])" :active="request()->routeIs($menu['Route'])">
                            {{ __($menu['Titulo']) }}
                        </x-nav-link>
                    </li>
                @endforeach --}}
                {{-- Login / usuario-logout --}}
                <!-- Right Side Of Navbar -->
                <!-- button Dark/light -->

                <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
                    class="mx-2 text-blue-500 dark:text-red-500 hover:bg-blue-300 dark:hover:bg-red-300 focus:outline-none focus:ring-1 focus:ring-red-200 dark:focus:ring-blue-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="none" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" fill="currentColor">
                        </path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="none" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="mr-3">
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">{{ __('Login') }}
                            </x-nav-link>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="mr-3">
                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">{{ __('Register') }}
                            </x-nav-link>
                        </li>
                    @endif
                @else
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <div class="flex justify-between">

                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
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
                            <form method="POST" action="{{ route('logout') }}">
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
