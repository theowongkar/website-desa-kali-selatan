@props([
    'title' => null,
    'width' => 'w-72',
    'align' => 'right',
])

<div x-data="{ open: false }" {{ $attributes->class(['relative']) }}>
    {{-- Trigger --}}
    {{ $trigger }}

    {{-- Konten Dropdown --}}
    <div x-cloak x-show="open" @click.outside="open = false" @keydown.escape.window="open = false" x-transition
        @class([
            'absolute z-30 mt-2 rounded-xl border border-gray-200 bg-white p-4 shadow-sm space-y-3',
            $width,
            'right-0' => $align === 'right',
            'left-0' => $align === 'left',
        ])>

        {{-- Header --}}
        @if ($title)
            <div class="flex items-center justify-between border-b border-gray-300 pb-3">
                <h3 class="font-semibold">
                    {{ $title }}
                </h3>

                <button type="button" @click="open = false"
                    class="cursor-pointer text-gray-400 transition hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

        {{-- Isi Konten --}}
        {{ $slot }}
    </div>
</div>
