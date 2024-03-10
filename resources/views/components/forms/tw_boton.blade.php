<!-- resources/views/components/forms/tw_boton.blade.php -->

@props([
    'bgColor' => 'blue',
    'textColor' => 'text-gray-100',
    'icon' => null,
    'disabled' => false,
    'w' => '6',
])

@php
<<<<<<< HEAD
  // Establecer clases específicas para el estado disabled
  $buttonClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
  $bgColorClass = "bg-$bgColor-500";
  $bgHoverClass = "hover:bg-$bgColor-300";
  $bgFocusClass = "focus:bg-$bgColor-700 focus:outline-none";
@endphp

<button {{ $attributes->merge(['class' => "relative flex items-center h-8 px-2 border-2 rounded-md {$bgColorClass} {$textColor} {$buttonClasses} transition-all duration-300 ease-in-out {$bgHoverClass} {$bgFocusClass}"]) }}
        @if ($disabled) disabled @endif style="width: {{ $w }}rem;">
  @if ($icon)
    <x-forms.tw_icons :fill="$textColor" :name="$icon" />
  @endif
  <span class="ml-2">{{ $slot ?? 'falta texto' }}</span> <!-- Cambiado a un guion (-) como ejemplo -->
=======
    // Establecer clases específicas para el estado disabled
    $buttonClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
    $bgColorClass = "bg-$bgColor-500";
    $bgHoverClass = "hover:bg-$bgColor-300";
    $bgFocusClass = "focus:bg-$bgColor-700 focus:outline-none";
@endphp

<button
    {{ $attributes->merge(['class' => "relative flex items-center h-8 px-2 border-2 rounded-md {$bgColorClass} {$textColor} {$buttonClasses} transition-all duration-300 ease-in-out {$bgHoverClass} {$bgFocusClass}"]) }}
    style="width: {{ $w }}rem;" @if ($disabled) disabled @endif>
    @if ($icon)
        <x-forms.tw_icons :fill="$textColor" :name="$icon" />
    @endif
    <span class="ml-2">{{ $slot ?? 'falta texto' }}</span> <!-- Cambiado a un guion (-) como ejemplo -->
>>>>>>> b6570d67212851f63002f3d3c374f00a60c118a8
</button>
