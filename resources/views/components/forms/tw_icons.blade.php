<!-- resources/views/components/forms/tw_icons.blade.php -->

@props(['name', 'fill' => 'currentColor'])

<svg class="w-5 h-5" fill="{{ $fill }}" xmlns="http://www.w3.org/2000/svg">
    <use xlink:href="{{ asset("images/icons/solid/{$name}.svg") }}"></use>
</svg>

{{-- <span class="fill-transparent"> {!! file_get_contents($iconPath) !!}</span> --}}


<!-- resources/views/components/icon.blade.php -->

{{-- @props(['name'])

@php
    $iconPath = public_path("images/icons/solid/{$name}.svg");
@endphp

@if (file_exists($iconPath))
    <svg {{ $attributes->merge(['class' => 'fill-current']) }}>
        <use xlink:href="{{ asset("images/icons/solid/{$name}.svg") }}"></use>
    </svg>
@else
    <span class="text-red-500">Icon not found: {{ $name }}</span>
@endif --}}
