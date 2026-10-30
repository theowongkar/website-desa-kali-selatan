<div
    {{ $attributes->merge([
        'class' =>
            'group overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1 hover:shadow-md',
    ]) }}>
    {{ $slot }}
</div>
