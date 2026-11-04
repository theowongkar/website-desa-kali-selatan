@props(['name', 'label' => null, 'value', 'checked' => false, 'required' => false, 'disabled' => false])

@php
    $hasError = $errors->has($name);
@endphp

<div class="space-y-1.5">
    {{-- Radio --}}
    <label for="{{ $name }}-{{ $value }}" class="inline-flex items-center gap-2">
        <input id="{{ $name }}-{{ $value }}" type="radio" name="{{ $name }}"
            value="{{ $value }}" @checked(old($name, $checked ? $value : null) == $value) @required($required) @disabled($disabled)
            {{ $attributes->class([
                'size-4 border-gray-300 transition',
                'border-red-500 focus:ring-red-500' => $hasError,
                'focus:ring-black' => !$hasError,
                'cursor-not-allowed bg-gray-100' => $disabled,
            ]) }}>

        {{-- Label --}}
        @if ($label)
            <span class="text-sm text-gray-800">
                {{ $label }}
            </span>
        @endif
    </label>

    {{-- Pesan Eror --}}
    <x-ui.forms.error :name="$name" />
</div>
