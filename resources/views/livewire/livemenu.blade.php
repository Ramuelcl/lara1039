@if ($orientation)
    <ul class="flex">
        @foreach ($menus as $menu)
            <li class="mr-3 list-none">
                <x-nav-link :href="url($menu['url'])" :active="request()->routeIs($menu['route'])">
                    {{ $menu['name'] }}
                </x-nav-link>
            </li>
        @endforeach
    </ul>
@else
    <div class="flex flex-col"> {{-- Cambiado a flex-col para una disposición vertical --}}
        @foreach ($menus as $menu)
            <x-nav-link :href="url($menu['url'])" :active="request()->routeIs($menu['route'])">
                {{ $menu['name'] }}
            </x-nav-link>
        @endforeach
    </div>
@endif
