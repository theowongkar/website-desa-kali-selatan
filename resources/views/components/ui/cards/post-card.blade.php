@props(['post'])

<x-ui.cards.card>
    {{-- Foto thumbnail --}}
    <div class="w-full h-44 bg-gray-100 border-b-2 border-gray-300 overflow-hidden">
        <img src="{{ $post->thumbnail_path
            ? asset('storage/' . $post->thumbnail_path)
            : asset('assets/images/profile-placeholder.jpg') }}"
            alt="Foto {{ $post->title }}"
            class="w-full h-full object-cover object-center
                   transition duration-500
                   group-hover:scale-105">
    </div>

    {{-- Informasi post --}}
    <div class="p-5 space-y-4">

        {{-- Judul --}}
        <h3 class="text-lg font-bold leading-tight line-clamp-1">
            {{ $post->title }}
        </h3>

        {{-- Konten --}}
        <p class="text-sm font-medium text-gray-600 line-clamp-3">
            {{ $post->content }}
        </p>

        {{-- Kategori dan tanggal --}}
        <div class="space-y-1">

            {{-- Kategori --}}
            <span class="flex items-center gap-2 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5 text-amber-500">
                    <path fill-rule="evenodd"
                        d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                        clip-rule="evenodd" />
                </svg>
                {{ $post->category->name }}
            </span>

            {{-- Tanggal --}}
            <time class="flex items-center gap-2 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5 text-blue-500">
                    <path
                        d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                    <path fill-rule="evenodd"
                        d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                        clip-rule="evenodd" />
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
            <a href="{{ route('post.show', $post->slug) }}"
                class="inline-block bg-primary px-3 py-1
                       text-white text-sm rounded-lg
                       hover:bg-primary/90
                       transition duration-200"
                aria-label="Lihat postingan: {{ $post->title }}">
                Lihat
            </a>
        </div>
    </div>
</x-ui.cards.card>
