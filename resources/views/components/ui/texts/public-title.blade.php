@props(['title'])

<h2 {{ $attributes->merge([
    'class' => 'mb-4 text-xl font-bold text-primary sm:text-2xl lg:text-3xl',
]) }}>
    {{ $title }}
</h2>
