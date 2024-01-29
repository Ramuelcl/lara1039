<!-- views/components/forms/tw_select.blade.php -->
@props(['idName' => 'idName', 'disabled' => false, 'label' => '', 'multiple' => false])
<div>
    @if ($label)
        <label for="{{ $idName }}" class="text-sm">{{ $label }}</label>
    @endif

    <select wire:model.live="{{ $idName }}" {{ $attributes->merge(['class' => 'text-xs mx-2 my-2 rounded-md']) }}
        {{ $disabled ? 'disabled' : '' }}>
        <option value="" disabled>{{ __('Select...') }}</option>
        {{ $slot }}
    </select>
</div>
