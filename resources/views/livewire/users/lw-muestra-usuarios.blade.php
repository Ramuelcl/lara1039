<div class="py-12 flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="bg-gray-100 px-4 py-3 items-center justify-between border-t border-ray-200 sm:px-6">
                    <div class="flex text-gray-500">
                        <select wire:model="collectionView"
                            class="w-[100px] text-gray-500 bg-gray-100 dark:text-gray-100 dark:bg-gray-800 mx-4 border-2 rounded-lg">
                            <option value="5">5</option>
                            <option value="15">15</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <div>
                            <input name="search" type="search" wire:model="search" placeholder="{{ __('search') }}"
                                class="w-1/2 text-gray-500 bg-gray-100 dark:text-gray-100 dark:bg-gray-800 mx-4 border-2 rounded-lg">
                        </div>
                    </div>
                    <table class="table-auto w-full min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th>
                                    ID</th>
                                <th>
                                    Name</th>
                                <th>
                                    Email</th>
                                <th>
                                    Activo</th>
                                <th>
                                    Foto</th>
                                <th>
                                    <span class="sr-only">{{ __('Options') }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                {{-- <tr > --}}
                                <tr
                                    class="{{ $key % 2 == 0 ? 'even' : 'odd' }} text-gray-500 bg-gray-100 dark:text-gray-100 dark:bg-gray-800">
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->is_active ? __('Yes') : __('No') }}
                                    </td>
                                    <td>
                                        @if (Storage::exists($user->profile_photo_path))
                                            <img src="{{ Storage::url($user->profile_photo_path) }}" class="w-5">
                                        @else
                                            <img src="{{ Storage::url('public/images/avatars/default.png') }}"
                                                class="w-5">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex justify-end">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.users.show', $user->id) }}"
                                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Roles</a>
                                                <form
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                                    method="POST"
                                                    action="{{ route('admin.users.destroy', $user->id) }}"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="flex text-gray-500 bg-blue-100 px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                        <div>
                            <select
                                class="rounded-lg mx-0 my-1 h-9 text-gray-600 dark:text-gray-600 bg-gray-200 dark:bg-gray-200">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div> {{ $users->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
