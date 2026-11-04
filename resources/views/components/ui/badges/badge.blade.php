@props([
    'variant' => 'default',
])

@php
    $variants = [
        'primary' => 'bg-primary text-white border border-accent',
        'secondary' => 'bg-secondary text-gray-200 border border-gray-800',
        'accent' => 'bg-accent text-black border border-yellow-800',
        'default' => 'bg-gray-100 text-gray-700 border border-gray-200',
        'success' => 'bg-green-100 text-green-700 border border-green-200',
        'warning' => 'bg-yellow-100 text-yellow-700 border border-yellow-200',
        'danger' => 'bg-red-100 text-red-700 border border-red-200',
        'info' => 'bg-blue-100 text-blue-700 border border-blue-200',
    ];
@endphp

<span
    {{ $attributes->class([
        'inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold',
        $variants[$variant] ?? $variants['default'],
    ]) }}>
    {{ $slot }}
</span>
