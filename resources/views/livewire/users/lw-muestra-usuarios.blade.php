<div class="flex flex-col py-12">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
      <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
        <div class="border-ray-200 items-center justify-between border-t bg-gray-100 px-4 py-3 sm:px-6">
          <div class="flex text-gray-500">
            @if ($users)
              {{-- {{ $search }} --}}
              @if ($bSearch)
                <label class="sr-only" for="search">Search</label>
                <div class="relative mx-1 mt-1">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg aria-hidden="true" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            fill-rule="evenodd"></path>
                    </svg>
                  </div>
                  <input class="block w-80 rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                         id="search" placeholder="{{ __('Search for items') }}" type="search"
                         wire:model.live="search">
                </div>
              @endif

<<<<<<< HEAD
              {{-- {{ $roles }} --}}
              @if ($bRoles || true)
                <x-forms.tw_select idName="user_rol">
                  <option value="">Todos</option>
                  @foreach ($roles_a as $role)
                    <option>{{ $role }}</option>
                  @endforeach
                </x-forms.tw_select>
              @endif
=======
                            {{-- {{ $roles }} --}}
                            @if ($bRoles || true)
                                <x-forms.tw_select idName="user_rol">
                                    <option value="">Todos</option>
                                    @foreach ($roles_a as $role)
                                        <option>{{ $role }}</option>
                                    @endforeach
                                </x-forms.tw_select>
                            @endif
>>>>>>> b6570d67212851f63002f3d3c374f00a60c118a8

              {{-- {{ $activo }} --}}
              @if ($bActive)
                <div class="mx-2 my-2">
                  {{-- <x-forms.tw_checkbox label="Actives ?" idName="activeAll" /> --}}
                  <label for="activeAll">Actives?</label>
                  <input class="ml-2" type="checkbox" wire:model.live="activeAll">
                </div>
                {{-- <x-forms.tw_checkbox label="Actives" :idName="$activeAll" class="mr-2" /> --}}
              @endif

              @if ($bSearch || $bActive)
                <button class="mt-2 h-9 rounded-md border-2 text-xs" wire:click="fncClear()">{{ __($display['clear']) }}
                </button>
              @endif
            @endif
          </div>

<<<<<<< HEAD
          <table class="min-w-full divide-y divide-gray-200">
            @foreach ($fields as $field)
              @if ($field['table']['display'])
                @php
                  // valida el campo a ordenar; si existe le pone cursor-pointer
                  $orden = in_array($field['name'], $fieldsOrden) ? $field['name'] : null;
                @endphp
                @if ($field['name'] == 'is_active')
                  <th class="bg-gray-50 px-6 py-3 text-left text-xs font-medium tracking-wider text-gray-500"
                      scope="col">
                    {{-- @if (!$activeAll) --}}
                    {{ __($field['table']['titre']) }}
                    {{-- @endif --}}
                  </th>
                @else
                  <th class="{{ $orden ? 'cursor-pointer' : '' }} bg-gray-50 px-6 py-3 text-left text-xs font-medium tracking-wider text-gray-500"
                      scope="col" wire:click="fncOrden('{{ $orden }}')">
                    {{ __($field['table']['titre']) }}
                    <x-forms.tw_iconSort :sortDir="$sortDir" :sortField="$sortField" campo="{{ $field['name'] }}" />
                  </th>
                @endif
              @endif
            @endforeach
            <th class="col-span-2 flex justify-between gap-2 px-6 py-3">
              <div>
                {{ __('actions') }}
                {{-- @hasanyrole('admin') --}}
              </div>
              <div class="justify-end">
                <x-forms.tw_boton bgColor="blue" icon="plus"
                                  wire:click="fncNewEdit(0)">{{ __($display['new']) }}</x-forms.tw_boton>
                {{-- <button wire:click="fncNewEdit(0)"
                                    class="button-primary text-xs inline-block"><x-forms.tw_icons name="plus"
                                        class="w-5 h-5" />{{ __($display['new']) }}
                                </button> --}}
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
=======
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
                                <x-forms.tw_boton wire:click="fncNewEdit(0)" icon="plus"
                                    bgColor="blue">{{ __($display['new']) }}</x-forms.tw_boton>
                                {{-- <button wire:click="fncNewEdit(0)"
                                    class="button-primary text-xs inline-block"><x-forms.tw_icons name="plus"
                                        class="w-5 h-5" />{{ __($display['new']) }}
                                </button> --}}
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
>>>>>>> b6570d67212851f63002f3d3c374f00a60c118a8

                          @case('profile_photo_path')
                            <img alt="def" class="w-5 rounded-md" src="{{ $reg->imageUrl() }}">
                          @break

                          @case('name')
                            {{ $reg->name }}
                          @break

<<<<<<< HEAD
                          @case('role')
                            {{ implode(', ', $reg->getRoleNames()->toArray()) }}
                          @break

                          @case('email')
                            {{ $reg->email }}
                          @break

                          @case('is_active')
                            {{-- @if (!$activeAll) --}}
                            <x-forms.tw_estado tipo="si-no" valor="{{ $reg->is_active }}" />
                            {{-- @endif --}}
                          @break

                          @default
                            Default case...
                        @endswitch
                      </td>
                    @endif
                  @endforeach
                  <td class="col-span-2 flex justify-around gap-2 px-6 py-4">
                    <div>
                      {{-- @hasanyrole('admin') --}}
                      <x-forms.tw_boton bgColor="orange" icon="user-group"
                                        wire:click="fncRoles({{ $reg->id }})">{{ __($display['roles']) }}</x-forms.tw_boton>
                      {{-- @endhasanyrole --}}
=======
                                                    @default
                                                        Default case...
                                                @endswitch
                                            </td>
                                        @endif
                                    @endforeach
                                    <td class="flex px-6 py-4 col-span-2 justify-around gap-2">
                                        <div>
                                            {{-- @hasanyrole('admin') --}}
                                            <x-forms.tw_boton wire:click="fncRoles({{ $reg->id }})"
                                                icon="user-group"
                                                bgColor="orange">{{ __($display['roles']) }}</x-forms.tw_boton>
                                            {{-- @endhasanyrole --}}
                                        </div>
                                        <div>
                                            {{-- @hasanyrole('admin') --}}
                                            <x-forms.tw_boton wire:click="fncNewEdit({{ $reg->id }})"
                                                icon="pencil"
                                                bgColor="green">{{ __($display['edit']) }}</x-forms.tw_boton>
                                            {{-- @endhasanyrole --}}
                                        </div>
                                        <div>
                                            {{-- @hasanyrole('admin') --}}
                                            <x-forms.tw_boton wire:click="fncDeleteConfirm({{ $reg->id }}"
                                                wire:loading.attr="disabled" icon="trash"
                                                bgColor="red">{{ __($display['delete']) }}</x-forms.tw_boton>
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
>>>>>>> b6570d67212851f63002f3d3c374f00a60c118a8
                    </div>
                    <div>
                      {{-- @hasanyrole('admin') --}}
                      <x-forms.tw_boton bgColor="green" icon="pencil"
                                        wire:click="fncNewEdit({{ $reg->id }})">{{ __($display['edit']) }}</x-forms.tw_boton>
                      {{-- @endhasanyrole --}}
                    </div>
                    <div>
                      {{-- @hasanyrole('admin') --}}
                      <x-forms.tw_boton bgColor="red" icon="trash" wire:click="fncDeleteConfirm({{ $reg->id }}"
                                        wire:loading.attr="disabled">{{ __($display['delete']) }}</x-forms.tw_boton>
                      {{-- @endhasanyrole --}}
                    </div>
                  </td>

                </tr>
              @endforeach
            </tbody>
          </table>
          <div
               class="flex items-center justify-between border-t border-gray-200 bg-blue-100 px-4 py-3 text-gray-500 sm:px-6">
            <div>
              <select class="rounded-md text-xs" wire:model.live="collectionView">
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
