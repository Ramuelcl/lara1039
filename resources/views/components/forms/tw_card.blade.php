<div
    class="relative flex flex-col min-w-0 rounded break-words border bg-blue-100 dark:bg-blue-800 border-1 border-blue-300 text-center">
    @isset($encabezado)
        <div class="py-3 px-6 mb-0 bg-blue-200 border-b-1 border-blue-300 text-blue-600">
            <div class="flex justify-between">
                <div>
                    {{ $encabezado }}
                </div>
                @isset($botonCierra)
                    <a href="{{ back() }}"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                        X</a>
                @endisset
            </div>
        </div>
    @endisset
    <div class="flex-auto p-6 text-blue-600">
        {{ $slot }}
    </div>
    @isset($piePagina)
        <div class="flex justify-between py-3 px-6 bg-blue-200 border-t-1 border-blue-300 text-blue-700">
            @isset($botonAccion1)
                {{ $botonAccion1 }}
            @endisset
            @isset($botonAccion2)
                {{ $botonAccion2 }}
            @endisset
            <a href="#"
                class="mr-2 inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">{{ __('Cancel') }}
            </a>
        </div>
    @endisset
</div>
