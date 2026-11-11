<x-layouts.public>

    {{-- Judul Halaman --}}
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Halaman Postingan --}}
    <div class="bg-gray-100">
        {{-- Hero Image --}}
        <section>
            <div class="relative h-44 sm:h-56 lg:h-64 w-full">
                {{-- Gambar Banner --}}
                <div class="absolute inset-0">
                    <img src="{{ asset('assets/images/post-banner.jpg') }}" alt="Banner Postingan"
                        class="h-full w-full object-cover object-center">
                    <div class="absolute inset-0 bg-black/70"></div>
                </div>

                {{-- Judul & Filter --}}
                <div class="absolute inset-0 z-10 flex flex-col items-center justify-center px-6">
                    <h1 class="mb-5 text-xl font-bold text-white uppercase sm:text-3xl lg:text-4xl">
                        Postingan
                    </h1>
                    <form action="{{ route('post.index') }}" method="GET"
                        class="flex w-full max-w-xl items-center gap-2" x-data @change="$el.requestSubmit()">
                        <x-ui.modals.dropdown title="Filter Postingan" align="left">
                            <x-slot:trigger>
                                <x-ui.buttons.button type="button" variant="outline" class="bg-white"
                                    @click="open = !open">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5 sm:size:4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                    </svg>
                                    <span class="hidden sm:block">
                                        Filter
                                    </span>
                                </x-ui.buttons.button>
                            </x-slot:trigger>
                            <x-ui.forms.select name="category">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </x-ui.forms.select>
                            <div>
                                <x-ui.forms.radio name="sort" label="Terbaru" value="latest" :checked="request('sort', 'latest') === 'latest'" />
                                <x-ui.forms.radio name="sort" label="Populer" value="popular" :checked="request('sort') === 'popular'" />
                            </div>
                        </x-ui.modals.dropdown>
                        <div class="flex-1">
                            <x-ui.forms.input name="search" placeholder="Cari postingan..." :value="request('search')"
                                autocomplete="off" class="bg-white" />
                        </div>
                        <x-ui.buttons.button type="submit"
                            class="py-2.5 border border-gray-300">Cari</x-ui.buttons.button>
                    </form>
                </div>
            </div>
        </section>

        {{-- Postingan --}}
        <x-layouts.container>
            {{-- Isi Konten --}}
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($posts as $post)
                    <x-ui.cards.post-card :post="$post" class="h-full" />
                @empty
                    <x-ui.alerts.empty-state title="Belum ada postingan" message="Postingan desa belum tersedia."
                        class="col-span-full" />
                @endforelse
            </div>

            {{-- Paginasi --}}
            @if ($posts->hasPages())
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @endif
        </x-layouts.container>
    </div>

</x-layouts.public>
