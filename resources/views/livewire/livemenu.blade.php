<div class="flex {{ !$orientation ? 'flex-col' : 'flex-row' }}"> {{-- disposición vertical/horizontal --}}
    @foreach ($menus as $menu)
        <x-nav-link :href="url($menu['url'])" :active="request()->routeIs($menu['route'])" class="{{ !$orientation ? '' : 'mx-2' }}">
            {{ $menu['name'] }}
        </x-nav-link>
    @endforeach
</div>
