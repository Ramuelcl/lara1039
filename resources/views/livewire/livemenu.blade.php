<div class="">
    <a href="{{ url('/user/1/name') }}">Alexis</a>
    <a href="{{ route('users.nombre', ['id' => 2, 'name' => 'Juan']) }}">Juan</a>
    @foreach ($menus as $menu)
        <li class="mr-3">
            <x-nav-link :href="url($menu['url'])" :active="request()->routeIs($menu['route'])">
                {{ __($menu['name']) }}
            </x-nav-link>
        </li>
    @endforeach
</div>
