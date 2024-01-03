<div class="flex flex-col sm:justify-center items-center py-6 sm:pt-0 bg-gray-100 dark:bg-gray-800 w-full">
    <div>
        {{ $logo ?? null }}
    </div>

    <div class="w-full sm:max-w-md mt-0 px-6 py-0 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
