<x-app-layout>
    <div class="max-w-7xl mx-2 sm:px-6 lg:px-8 ">
        <div class="py-3 mx-auto">
            <h2
                class="font-semibold text-xl leading-tight text-gray-800 bg-gray-100 dark:text-gray-100 dark:bg-gray-800">
                {{ __('Users') }}
            </h2>
        </div>
        <div class="py-3">
            <div
                class="text-gray-800 bg-gray-100 dark:text-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @livewire('users.lw_muestra-usuarios')
            </div>
        </div>
    </div>
</x-app-layout>
