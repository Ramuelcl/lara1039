<!-- views/components/forms/tw_select.blade.php -->
@props(['idName', 'disabled' => false, 'label' => '', 'multiple' => false])
<div>
  @if ($label)
    <label class="text-sm" for="{{ $idName }}">{{ $label }}</label>
  @endif

  <select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'text-xs mx-2 my-2 rounded-md']) }}
          wire:model.live="{{ $idName }}">
    <option disabled value=" ">{{ __('Select...') }}</option>
    {{ $slot }}
  </select>
</div>
