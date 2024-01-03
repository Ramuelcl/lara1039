<!-- Contenido del archivo header.blade.php -->
<nav class="flex items-center justify-between flex-wrap p-6 fixed w-full z-10 top-0" x-data="{ isOpen: false }"
    @keydown.escape="isOpen = false" :class="{ 'shadow-lg bg-indigo-900': isOpen, 'bg-gray-800': !isOpen }">
    <!--Logo etc-->
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
            <span class="text-2xl pl-2">
                <i class="em em-grinning">
                    N
                </i> Brand McBrandface</span>
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
    <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
        :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false"
        x-show.transition="true">
        <ul class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
                <a class="inline-block py-2 px-4 text-white no-underline" href="#" @click="isOpen = false">Active
                </a>
            </li>
            <li class="mr-3">
                <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                    href="#" @click="isOpen = false">link
                </a>
            </li>
            <li class="mr-3">
                <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                    href="#" @click="isOpen = false">link
                </a>
            </li>
            <li class="mr-3">
                <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                    href="#" @click="isOpen = false">link
                </a>
            </li>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger"></x-slot>
                <x-slot name="content">
                    <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </x-slot>
            </x-dropdown>
        </ul>
    </div>
</nav>
