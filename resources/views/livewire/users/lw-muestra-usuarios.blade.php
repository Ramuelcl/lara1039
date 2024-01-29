<div class="py-12 flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="bg-gray-100 px-4 py-3 items-center justify-between border-t border-ray-200 sm:px-6">
                    <div class="flex text-gray-500">
                        @if ($users)
                            {{-- {{ $search }} --}}
                            @if ($bSearch)
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative mt-1 mx-1">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input wire:model.live="search" type="search" id="search"
                                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="{{ __('Search for items') }}">
                                </div>
                            @endif

                            {{-- {{ $roles }} --}}
                            @if ($bRoles)
                                <x-forms.tw_select idName="rol">
                                    @foreach ($roles_a as $role)
                                        <option>{{ $role }}</option>
                                    @endforeach
                                </x-forms.tw_select>
                            @endif

                            {{-- {{ $activo }} --}}
                            @if ($bActive)
                                <div class="mx-2 my-2">
                                    {{-- <x-forms.tw_checkbox label="Actives ?" idName="activeAll" /> --}}
                                    <label for="activeAll">Actives?</label>
                                    <input type="checkbox" wire:model.live="activeAll" class="ml-2">
                                </div>
                                {{-- <x-forms.tw_checkbox label="Actives" :idName="$activeAll" class="mr-2" /> --}}
                            @endif

                            @if ($bSearch || $bActive)
                                <button wire:click="fncClear()"
                                    class="mt-2 border-2 text-xs rounded-md h-9">{{ __($display['clear']) }}
                                </button>
                            @endif
                        @endif
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        @foreach ($fields as $field)
                            @if ($field['table']['display'])
                                @php
                                    // valida el campo a ordenar; si existe le pone cursor-pointer
                                    $orden = in_array($field['name'], $fieldsOrden) ? $field['name'] : null;
                                @endphp
                                @if ($field['name'] == 'is_active')
                                    <th scope="col"
                                        class="bg-gray-50 px-6 py-3 text-left text-xs font-medium tracking-wider text-gray-500">
                                        {{-- @if (!$activeAll) --}}
                                        {{ __($field['table']['titre']) }}
                                        {{-- @endif --}}
                                    </th>
                                @else
                                    <th wire:click="fncOrden('{{ $orden }}')" scope="col"
                                        class="{{ $orden ? 'cursor-pointer' : '' }} bg-gray-50 px-6 py-3 text-left text-xs font-medium tracking-wider text-gray-500">
                                        {{ __($field['table']['titre']) }}
                                        <x-forms.tw_iconSort campo="{{ $field['name'] }}" :sortField="$sortField"
                                            :sortDir="$sortDir" />
                                    </th>
                                @endif
                            @endif
                        @endforeach
                        <th class="flex justify-between px-6 py-3 col-span-2 gap-2">
                            <div>
                                {{ __('actions') }}
                                {{-- @hasanyrole('admin') --}}
                            </div>
                            <div class="justify-end">
                                <button wire:click="fncNewEdit(0)"
                                    class="button-primary text-xs inline-block"><x-forms.tw_icons name="plus"
                                        class="w-5 h-5" />{{ __($display['new']) }}
                                </button>
                                {{-- @endhasanyrole --}}
                            </div>
                        </th>
                        <tbody>
                            @foreach ($users as $key => $reg)
                                @php
                                    $cl = ($key + 1) % 2 === 0 ? '50' : '400';
                                @endphp
                                <tr
                                    class="bg-gray-{{ $cl }} dark:bg-gray-{{ $cl == '50' ? $cl + 450 : $cl + 400 }} border-b hover:bg-gray-300 dark:border-gray-700 dark:hover:bg-gray-600">
                                    @foreach ($fields as $field)
                                        @if ($field['table']['display'])
                                            <td class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                                                @switch($field['name'])
                                                    @case('id')
                                                        <!-- // relleno de ceros -->
                                                        {{ sprintf('%05d', $reg->id) }}
                                                        <!-- // formato con decimales -->
                                                        {{-- -{{ number_format($key + 1, 0, ',', '.') }} --}}
                                                    @break

                                                    @case('profile_photo_path')
                                                        @if (Storage::exists($reg->profile_photo_path))
                                                            <img src="{{ Storage::url($reg->profile_photo_path) }}"
                                                                class="w-5 rounded-full" alt="avatar">
                                                        @else
                                                            <img src="{{ Storage::url('public/images/avatars/default.png') }}"
                                                                class="w-5 rounded-full" alt="avatar">
                                                        @endif
                                                    @break

                                                    @case('name')
                                                        {{ $reg->name }}
                                                    @break

                                                    @case('role')
                                                        {{ implode(', ', $reg->getRoleNames()->toArray()) }}
                                                    @break

                                                    @case('email')
                                                        {{ $reg->email }}
                                                    @break

                                                    @case('is_active')
                                                        {{-- @if (!$activeAll) --}}
                                                        <x-forms.tw_estado valor="{{ $reg->is_active }}" tipo="si-no" />
                                                        {{-- @endif --}}
                                                    @break

                                                    @default
                                                        Default case...
                                                @endswitch
                                            </td>
                                        @endif
                                    @endforeach
                                    <td class="flex px-6 py-4 col-span-2 justify-around gap-2">
                                        <div>
                                            {{-- @hasanyrole('admin') --}}
                                            <button wire:click="fncRoles({{ $reg->id }})"
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-xs bg-yellow-200 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-200 focus:border-2 focus:border-gray-800 dark:focus:border-gray-100"><x-forms.tw_icons
                                                    name="user-group" class="w-5 h-5 inline-block" />
                                                {{ __($display['roles']) }}
                                            </button>
                                            {{-- @endhasanyrole --}}
                                        </div>
                                        <div>
                                            <!-- Ejemplo de un botón con un icono SVG -->
                                            <x-forms.tw_boton icon="pencil">Edit</x-forms.tw_boton>


                                            {{-- @hasanyrole('admin') --}}
                                            <button wire:click="fncNewEdit({{ $reg->id }})"
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-xs bg-green-200 text-green-800 dark:bg-green-800 dark:text-green-200 focus:border-2 focus:border-gray-800 dark:focus:border-gray-100"><x-forms.tw_icons
                                                    name="pencil" class="w-5 h-5 inline-block" />

                                                {{ __($display['edit']) }}
                                            </button>
                                            {{-- @endhasanyrole --}}
                                        </div>
                                        <div>
                                            {{-- @hasanyrole('admin') --}}
                                            <button wire:click="fncDeleteConfirm({{ $reg->id }})"
                                                wire:loading.attr="disabled"
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-xs bg-red-200 text-red-800 dark:bg-red-800 dark:text-red-200 focus:border-2 focus:border-gray-800 dark:focus:border-gray-100"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 inline-flex">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>

                                                {{ __($display['delete']) }}
                                            </button>
                                            {{-- @endhasanyrole --}}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="flex text-gray-500 bg-blue-100 px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                        <div>
                            <select wire:model.live="collectionView" class="rounded-md text-xs">
                                @foreach ($collectionViews as $collectionView)
                                    <option value="{{ $collectionView }}">{{ $collectionView }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=""> {{ $users->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
