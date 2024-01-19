<div class="py-12 flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="bg-gray-100 px-4 py-3 items-center justify-between border-t border-ray-200 sm:px-6">
                    <div class="flex text-gray-500">

                        <div>
                            <input name="search" type="search" wire:model.live="search" placeholder="{{ __('search') }}"
                                class="w-1/2 text-gray-500 bg-gray-100 dark:text-gray-100 dark:bg-gray-800 mx-4 border-2 rounded-lg">
                        </div>
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
                                        @if (!$activeAll)
                                            {{ __($field['table']['titre']) }}
                                        @endif
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
                                <button wire:click="fncNewEdit(0)" class="button-primary text-xs inline-flex"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    {{ __($display['new']) }}
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
                                                        {{-- @if (substr($reg->profile_photo_path, 0, 8) == 'https://')
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ $reg->profile_photo_path }}" alt="avatar">
                                                        @else
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ asset($reg->profile_photo_path) }}" alt="avatar">
                                                        @endif --}}
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
                                                        @if (!$activeAll)
                                                            <x-forms.tw_estado valor="{{ $reg->is_active }}" tipo="si-no" />
                                                        @endif
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
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-xs bg-yellow-200 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-200 focus:border-2 focus:border-gray-800 dark:focus:border-gray-100"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 inline-flex">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                {{ __($display['roles']) }}
                                            </button>
                                            {{-- @endhasanyrole --}}
                                        </div>
                                        <div>
                                            {{-- @hasanyrole('admin') --}}
                                            <button wire:click="fncNewEdit({{ $reg->id }})"
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-xs bg-green-200 text-green-800 dark:bg-green-800 dark:text-green-200 focus:border-2 focus:border-gray-800 dark:focus:border-gray-100"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 inline-flex">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>

                                                {{ __($display['edit']) }}
                                            </button>
                                            {{-- @endhasanyrole --}}
                                        </div>
                                        <div>
                                            {{-- @hasanyrole('admin') --}} <button
                                                wire:click="fncDeleteConfirm({{ $reg->id }})"
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
                        <div> {{ $users->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
