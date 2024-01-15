<div class="flex {{ !$orientation ? 'flex-col' : 'flex-row' }}"> {{-- disposición vertical/horizontal --}}
    @foreach ($menus as $menu)
        @if ($menu['url'])
            <x-nav-link :href="url($menu['url'])" :active="request()->routeIs($menu['route'])" class="{{ !$orientation ? '' : 'mx-2' }}">
                {{ $menu['name'] }}
            </x-nav-link>
        @else
            <x-nav-link href="#" class="{{ !$orientation ? '' : 'mx-2' }}">
                {{ $menu['name'] }}
            </x-nav-link>
        @endif
    @endforeach
</div>
