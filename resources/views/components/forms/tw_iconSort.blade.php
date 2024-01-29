<!-- resources/views/components/forms/tw_iconSort.blade.php -->
@props(['campo', 'sortField', 'sortDir'])

@if ($sortField === $campo)
    <span class="inline-block">
        @if ($sortDir === 'asc')
            <x-forms.tw_icons name="arrow-circle-up" class="w-5 h-5 text-blue-500" />
        @elseif ($sortDir === 'desc')
            <x-forms.tw_icons name="arrow-circle-down" class="w-5 h-5 text-blue-500" />
        @else
            —
        @endif
    </span>
@endif
