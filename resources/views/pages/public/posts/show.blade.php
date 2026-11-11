<x-layouts.public>

    {{-- Judul Halaman --}}
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Halaman Lihat Postingan --}}
    <div class="bg-gray-100">
        <x-layouts.container class="max-w-4xl">
            {{-- Tombol Kembali --}}
            <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 mb-2 text-primary hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
                Kembali
            </a>

            {{-- Artikel --}}
            <x-ui.cards.card class="space-y-5 p-5 sm:p-7 lg:p-8 hover:translate-y-0">
                {{-- Header Artikel --}}
                <header>
                    <x-ui.badges.badge variant="accent">{{ $post->category->name }}</x-ui.badges.badge>
                    <x-ui.texts.public-title title="{{ $post->title }}" class="mt-4" />
                    <div class="flex flex-wrap items-center gap-2">
                        <x-ui.badges.badge variant="outline" class="gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-4">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $post->author->name }}
                        </x-ui.badges.badge>
                        <x-ui.badges.badge variant="outline" class="gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-4">
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                <path fill-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ number_format($post->views_count, 0, ',', '.') }}
                        </x-ui.badges.badge>
                    </div>
                </header>

                {{-- Thumbnail --}}
                <div>
                    <div class="w-full overflow-hidden rounded-xl bg-gray-100 border">
                        <img src="{{ $post->thumbnail_path
                            ? asset('storage/' . $post->thumbnail_path)
                            : asset('assets/images/profile-placeholder.jpg') }}"
                            alt="Foto {{ $post->title }}" class="aspect-video object-cover object-center">
                    </div>
                </div>

                {{-- Isi Artikel --}}
                <div>
                    <x-ui.texts.public-paragraph content="{!! $post->content !!}" />
                </div>
            </x-ui.cards.card>

            {{-- Gambar --}}
            <x-ui.cards.card class="mt-5 p-5 sm:p-7 lg:p-8 hover:translate-y-0">
                <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                    @forelse ($post->images as $postImage)
                        <div class="w-full overflow-hidden rounded-xl bg-gray-100 border">
                            <img src="{{ $postImage->image_path
                                ? asset('storage/' . $postImage->image_path)
                                : asset('assets/images/profile-placeholder.jpg') }}"
                                alt="Foto {{ $post->title }}" loading="lazy"
                                class="aspect-video object-cover object-center">
                        </div>
                    @empty
                        <div class="col-span-full">
                            <x-ui.alerts.empty-state title="Belum ada gambar" message="Gambar postingan belum tersedia."
                                class="bg-transparent p-0" />
                        </div>
                    @endforelse
                </div>
            </x-ui.cards.card>
        </x-layouts.container>
    </div>

</x-layouts.public>
