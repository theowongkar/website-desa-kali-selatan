@props([
    'name',
    'label' => null,
    'placeholder' => '',
    'value' => null,
    'rows' => 4,
    'required' => false,
    'disabled' => false,
])

@php
    $hasError = $errors->has($name);
@endphp

<div class="space-y-1.5">
    {{-- Label --}}
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-800">
            {{ $label }}

            @if ($required)
                <span class="text-red-600">*</span>
            @endif
        </label>
    @endif

    {{-- Textarea --}}
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        @required($required) @disabled($disabled)
        {{ $attributes->class([
            'w-full rounded-lg border px-3 py-2.5 text-sm outline-none transition',
            'border-red-500 focus:border-black' => $hasError,
            'border-gray-300 focus:border-black' => !$hasError,
            'cursor-not-allowed bg-gray-100' => $disabled,
        ]) }}>{{ old($name, $value) }}</textarea>

    {{-- Pesan Eror --}}
    <x-ui.forms.error :name="$name" />
</div>
