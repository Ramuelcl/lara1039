<!-- Contenido del archivo header.blade.php -->
<header class="bg-gray-100 dark:bg-gray-950">
    <nav class="flex items-center justify-between flex-wrap p-6 fixed w-full z-10 top-0" x-data="{ isOpen: false }"
        @keydown.escape="isOpen = false"
        :class="{
            'shadow-gray-600 dark:shadow-gray-100 bg-gray-100 dark:bg-gray-800': isOpen,
            'shadow-gray-600 dark:shadow-gray-100 bg-gray-100 dark:bg-gray-800': !
                isOpen
        }">
        <!--Logo etc-->
        <div class="flex items-center flex-shrink-0 text-gray-200 dark:text-gray-800 mr-6">
            <a href="/">
                {{-- {{ route('home') }} --}}
                <x-application-logo class="mr-2" />
            </a>
            <a class="text-gray-800 dark:text-gray-200 hover:text-gray-400 hover:dark:text-gray-400 no-underline hover:no-underline"
                href="/">
                {{-- {{ route('home') }} --}}
                <span class="ml-2">{{ __($NombreEmpresa ?? 'Guzanet') }}</span>
            </a>
        </div>

        <!--Toggle button (hidden on large screens)-->
        <button @click="isOpen = !isOpen" type="button"
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
        @php
            $menus = [['Titulo' => 'Dashboard', 'Route' => 'dashboard', 'disabled' => 0, 'active' => 1]];

        @endphp
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
            :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false"
            x-show.transition="true">
            {{-- menu --}}
            <ul class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center">
                @foreach ($menus as $menu)
                    <li class="mr-3">
                        <x-nav-link :href="route($menu['Route'])" :active="request()->routeIs($menu['Route'])">
                            {{ __($menu['Titulo']) }}
                        </x-nav-link>
                    </li>
                @endforeach
                {{-- Login / usuario-logout --}}
                <!-- Right Side Of Navbar -->

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
