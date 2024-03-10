<x-admin-layout>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="border-b border-gray-200 bg-white p-6">
          Usuarios : {{ $users }}
        </div>
        <div class="border-b border-gray-200 bg-white p-6">
          Roles : {{ $roles }}
        </div>
        <div class="border-b border-gray-200 bg-white p-6">
          Permisos : {{ $permisos }}
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>
