<!-- resources/views/components/forms/tw_icons.blade.php -->

@props(['name', 'fill' => 'currentColor'])
@php
    $iconPath = public_path("images/icons/solid/{$name}.svg");
@endphp
@if (file_exists($iconPath))
    <svg class="w-5 h-5" fill="{{ $fill }}" xmlns="http://www.w3.org/2000/svg">
        {!! file_get_contents($iconPath) !!}
    </svg>
@else
    <span class="text-red-500">Icon not found: {{ $name }}</span>
@endif
