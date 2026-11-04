@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'disabled' => false,
])

@php
    $variants = [
        'primary' => 'bg-primary text-white hover:bg-primary/90',
        'secondary' => 'bg-secondary text-gray-200 hover:bg-secondary/90',
        'accent' => 'bg-accent text-black hover:bg-accent/90',
        'outline' => 'border border-gray-300 text-gray-800 hover:bg-gray-50',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        'success' => 'bg-green-600 text-white hover:bg-green-700',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2.5 text-sm',
        'lg' => 'px-5 py-3 text-base',
    ];
@endphp

{{-- Button --}}
<button type="{{ $type }}" @disabled($disabled)
    {{ $attributes->class([
        'inline-flex items-center justify-center gap-2 rounded-lg font-medium transition-colors cursor-pointer',
        'focus:outline-none focus:border-black',
        'disabled:cursor-not-allowed disabled:opacity-50',
        $variants[$variant] ?? $variants['primary'],
        $sizes[$size] ?? $sizes['md'],
    ]) }}>
    {{ $slot }}
</button>
