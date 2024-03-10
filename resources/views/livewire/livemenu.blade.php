<div class="{{ !$orientation ? 'flex-col' : 'flex-row' }} flex"> {{-- disposición vertical/horizontal --}}
  {{-- @dd($menus) --}}
  @foreach ($menus as $menu)
    @if ($menu['url'])
      <x-nav-link :active="request()->routeIs($menu['route'])" :href="url($menu['url'])" class="{{ !$orientation ? '' : 'mx-2' }}">
        @isset($menu['icon'])
          <x-slot name="icon">
            <x-forms.icons name={{ $menu['icon'] }}>
          </x-slot>
        @endisset
        {{ $menu['name'] }}
      </x-nav-link>
    @else
      <x-nav-link class="{{ !$orientation ? '' : 'mx-2' }}" href="#">
        {{ $menu['name'] }}
      </x-nav-link>
    @endif
  @endforeach
</div>
