<x-admin-layout>
  <div class="w-full py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white p-2 shadow-sm sm:rounded-lg">
        <div class="flex p-2">
          <a class="rounded-md bg-green-700 px-4 py-2 text-slate-100 hover:bg-green-500"
             href="{{ route('admin.admin.users.index') }}">Users Index</a>
        </div>
        <div class="flex flex-col bg-slate-100 p-2">
          <div>User Name: {{ $user->name }}</div>
          <div>User Email: {{ $user->email }}</div>
        </div>
        <div class="mt-6 bg-slate-100 p-2">
          <h2 class="text-2xl font-semibold">Roles</h2>
          <div class="mt-4 flex space-x-2 p-2">
            @if ($user->roles)
              @foreach ($user->roles as $user_role)
                <form action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                      class="rounded-md bg-red-500 px-4 py-2 text-white hover:bg-red-700" method="POST"
                      onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit">{{ $user_role->name }}</button>
                </form>
              @endforeach
            @endif
          </div>
          <div class="mt-6 max-w-xl">
            <form action="{{ route('admin.users.roles', $user->id) }}" method="POST">
              @csrf
              <div class="sm:col-span-6">
                <label class="block text-sm font-medium text-gray-700" for="role">Roles</label>
                <select autocomplete="role-name"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        id="role" name="role">
                  @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
              @error('role')
                <span class="text-sm text-red-400">{{ $message }}</span>
              @enderror
          </div>
          <div class="pt-5 sm:col-span-6">
            <button class="rounded-md bg-green-500 px-4 py-2 hover:bg-green-700" type="submit">Assign</button>
          </div>
          </form>
        </div>
        <div class="mt-6 bg-slate-100 p-2">
          <h2 class="text-2xl font-semibold">Permissions</h2>
          <div class="mt-4 flex space-x-2 p-2">
            @if ($user->permissions)
              @foreach ($user->permissions as $user_permission)
                <form action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                      class="rounded-md bg-red-500 px-4 py-2 text-white hover:bg-red-700" method="POST"
                      onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit">{{ $user_permission->name }}</button>
                </form>
              @endforeach
            @endif
          </div>
          <div class="mt-6 max-w-xl">
            <form action="{{ route('admin.users.permissions', $user->id) }}" method="POST">
              @csrf
              <div class="sm:col-span-6">
                <label class="block text-sm font-medium text-gray-700" for="permission">Permission</label>
                <select autocomplete="permission-name"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        id="permission" name="permission">
                  @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                  @endforeach
                </select>
              </div>
              @error('name')
                <span class="text-sm text-red-400">{{ $message }}</span>
              @enderror
          </div>
          <div class="pt-5 sm:col-span-6">
            <button class="rounded-md bg-green-500 px-4 py-2 hover:bg-green-700" type="submit">Assign</button>
          </div>
          </form>

        </div>
      </div>

    </div>
  </div>
  </div>
</x-admin-layout>
