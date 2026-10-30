@props(['post'])

<x-ui.cards.card>
    {{-- Foto thumbnail --}}
    <div class="relative h-44 overflow-hidden bg-gray-100">
        <img src="{{ $post->thumbnail_path
            ? asset('storage/' . $post->thumbnail_path)
            : asset('assets/images/profile-placeholder.jpg') }}"
            alt="Foto {{ $post->title }}"
            class="w-full h-full object-cover object-center
                   transition duration-500
                   group-hover:scale-105">

        {{-- Overlay --}}
        <div class="absolute inset-x-0 bottom-0 h-24
                   bg-gradient-to-t from-black/50 to-transparent">
        </div>
    </div>

    {{-- Informasi post --}}
    <div class="p-5 space-y-4">

        {{-- Judul --}}
        <h3 class="text-lg font-bold leading-tight line-clamp-2">
            {{ $post->title }}
        </h3>

        {{-- Konten --}}
        <p class="text-sm font-medium text-gray-800 line-clamp-3">
            {{ $post->content }}
        </p>

        {{-- Kategori dan tanggal --}}
        <div class="space-y-1">

            {{-- Kategori --}}
            <span class="flex items-center gap-2 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-amber-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                </svg>

                {{ $post->category->name }}
            </span>

            {{-- Tanggal --}}
            <time class="flex items-center gap-2 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-blue-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>

                {{ $post->created_at->translatedFormat('d F Y') }}
            </time>
        </div>

        {{-- Garis --}}
        <div class="h-1 w-full rounded-full bg-secondary
                   group-hover:bg-primary"></div>

        {{-- Footer --}}
        <div class="flex justify-end items-center gap-1">

            {{-- Jumlah views --}}
            <span
                class="inline-flex items-center gap-1
                       bg-secondary px-3 py-1 text-white
                       text-sm rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                {{ $post->views_count }}
            </span>

            {{-- Tombol lihat --}}
            <a href="#"
                class="inline-block bg-primary px-3 py-1
                       text-white text-sm rounded-lg
                       hover:bg-primary/90
                       transition duration-200">
                Lihat
            </a>
        </div>
    </div>
</x-ui.cards.card>
