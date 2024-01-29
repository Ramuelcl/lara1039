{{-- @props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}> --}}


@props(['disabled' => false, 'type' => 'text', 'idName' => 'name', 'label' => '', 'placeholder' => ''])

<div class="mr-1 mb-3">
    <div>
        @if ($label)
            <x-tw_label for="{{ $idName }}"
                class="block text-sm font-medium text-gray-700">{{ $label }}</x-tw_label>
        @endif
        <div class="mt-1 relative rounded-md shadow-sm">
            <input wire:model="{{ $idName }}" type="{{ $type }}" name="{{ $idName }}"
                id="{{ $idName }}" placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                {{ $attributes->merge(['class' => 'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-1 sm:text-sm border-gray-300 rounded-md']) }}>
        </div>
        <x-tw_input-error for="{{ $idName }}"></x-tw_input-error>
    </div>
</div>
