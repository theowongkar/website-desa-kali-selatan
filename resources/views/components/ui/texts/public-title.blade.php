@props(['title'])

<h2
    {{ $attributes->merge([
        'class' => 'mb-4 text-2xl font-bold uppercase text-primary sm:text-3xl lg:text-4xl',
    ]) }}>
    {{ $title }}
</h2>
