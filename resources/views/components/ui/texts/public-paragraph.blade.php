@props(['content'])

<p {{ $attributes->merge([
    'class' => 'text-sm leading-6 sm:text-base',
]) }}>
    {{ $content }}
</p>
