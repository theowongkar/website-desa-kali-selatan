@props(['villageOfficial'])

<x-ui.cards.card>
    {{-- Foto --}}
    <div class="relative h-64 overflow-hidden bg-gray-100">
        <img src="{{ $villageOfficial->photo_path
            ? asset('storage/' . $villageOfficial->photo_path)
            : asset('assets/images/profile-placeholder.jpg') }}"
            alt="Foto {{ $villageOfficial->name }}" loading="lazy"
            class="h-full w-full object-cover object-top
                   transition duration-500
                   group-hover:scale-105">

        {{-- Overlay --}}
        <div class="absolute inset-x-0 bottom-0 h-24
                    bg-gradient-to-t from-black/50 to-transparent">
        </div>
    </div>

    {{-- Informasi --}}
    <div class="p-5 text-center">
        <h3 class="text-sm font-bold sm:text-base lg:text-lg
                   transition group-hover:text-primary">
            {{ $villageOfficial->name }}
        </h3>

        <div class="mx-auto my-2 h-1 w-10
                    rounded-full bg-primary">
        </div>

        <p class="text-sm font-medium text-gray-800">
            {{ $villageOfficial->position }}
        </p>
    </div>
</x-ui.cards.card>
