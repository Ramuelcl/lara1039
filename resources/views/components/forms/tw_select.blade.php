<!-- views/components/forms/tw_select.blade.php -->
@props(['idName', 'disabled' => false, 'label' => '', 'multiple' => false])
<div>
  @if ($label)
    <label class="text-sm" for="{{ $idName }}">{{ $label }}</label>
  @endif

<<<<<<< HEAD
  <select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'text-xs mx-2 my-2 rounded-md']) }}
          wire:model.live="{{ $idName }}">
    <option disabled value=" ">{{ __('Select...') }}</option>
    {{ $slot }}
  </select>
=======
    <select wire:model.live="{{ $idName }}" {{ $attributes->merge(['class' => 'text-xs mx-2 my-2 rounded-md']) }}
        {{ $disabled ? 'disabled' : '' }}>
        <option value=" " disabled>{{ __('Select...') }}</option>
        {{ $slot }}
    </select>
>>>>>>> b6570d67212851f63002f3d3c374f00a60c118a8
</div>
