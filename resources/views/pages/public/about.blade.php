<x-layouts.public>

    {{-- Judul Halaman --}}
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Halaman Profil Desa --}}
    <div
        class="bg-[radial-gradient(ellipse_at_top_left,rgba(178,34,34,0.1),transparent_50%),radial-gradient(ellipse_at_bottom_right,rgba(212,175,55,0.3),transparent_50%),radial-gradient(rgba(156,163,175,0.3)_1px,transparent_1px)] [background-size:auto,auto,20px_20px]">
        {{-- Visi dan Misi --}}
        <x-layouts.container class="flex flex-col justify-center items-center gap-5 mx-0">
            {{-- Visi --}}
            <div>
                <x-ui.cards.card class="w-full max-w-2xl p-5">
                    <x-ui.texts.public-title title="Visi" class="text-center" />
                    <x-ui.texts.public-paragraph content="{!! $villageProfile->vision !!}" class="text-center" />
                </x-ui.cards.card>
            </div>

            {{-- Misi --}}
            <div>
                <x-ui.cards.card class="w-full max-w-2xl p-5">
                    <x-ui.texts.public-title title="Misi" class="text-center" />
                    <x-ui.texts.public-paragraph content="{!! $villageProfile->mission !!}" />
                </x-ui.cards.card>
            </div>
        </x-layouts.container>

        {{-- Sejarah Desa --}}
        <x-layouts.container>
            {{-- Header Konten --}}
            <x-ui.texts.public-title title="Deskripsi & Sejarah Desa" />

            {{-- Isi Konten --}}
            <div class="grid gap-8 md:grid-cols-5 md:gap-10">
                <div class="md:col-span-3">
                    <div class="w-full h-96 overflow-hidden rounded-xl shadow-lg">
                        <img src="{{ $villageProfile->photo_path
                            ? asset('storage/' . $villageProfile->photo_path)
                            : asset('assets/images/profile-placeholder.jpg') }}"
                            alt="Foto {{ $villageProfile->village }}"
                            class="w-full h-full object-cover object-center transition duration-500 hover:scale-105">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <div class="mt-5 rounded-lg border-l-4 border-primary bg-primary/4 p-5">
                        <x-ui.texts.public-paragraph content="{!! $villageProfile->history !!}" />
                    </div>
                </div>
            </div>
        </x-layouts.container>

        {{-- Struktur Organisasi --}}
        <x-layouts.container>
            {{-- Header Konten --}}
            <div class="flex flex-col justify-center items-center mb-5 text-center">
                <x-ui.texts.public-title title="SOTK" />
                <x-ui.texts.public-paragraph
                    content="Struktur Organisasi dan Tata Kerja Desa {{ $villageProfile->village }}" />
            </div>

            {{-- Isi Konten --}}
            <div class="grid grid-cols-2 gap-2 sm:gap-4 lg:gap-6
                    lg:grid-cols-3">
                @foreach ($villageOfficials as $villageOfficial)
                    <x-ui.cards.card>
                        {{-- Foto --}}
                        <div class="relative h-64 overflow-hidden bg-gray-100">
                            <img src="{{ $villageOfficial->photo_path
                                ? asset('storage/' . $villageOfficial->photo_path)
                                : asset('assets/images/profile-placeholder.jpg') }}"
                                alt="Foto {{ $villageOfficial->name }}"
                                class="w-full h-full object-cover object-top
                                   transition duration-500
                                   group-hover:scale-105">
                            {{-- Overlay --}}
                            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/50 to-transparent">
                            </div>
                        </div>
                        {{-- Informasi --}}
                        <div class="p-5 text-center">
                            <h3
                                class="text-sm sm:text-md lg:text-lg font-bold
                                   transition group-hover:text-primary">
                                {{ $villageOfficial->name }}
                            </h3>
                            <div
                                class="mx-auto my-3 h-1 w-10
                                    rounded-full bg-primary">
                            </div>
                            <p class="text-sm font-medium text-gray-800">
                                {{ $villageOfficial->position }}
                            </p>
                        </div>
                    </x-ui.cards.card>
                @endforeach
            </div>
        </x-layouts.container>

        {{-- Informasi Lainnya --}}
        <x-layouts.container>
            {{-- Header Konten --}}
            <x-ui.texts.public-title title="Informasi Lainnya" />

            {{-- Isi Konten --}}
            <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-3">
                {{-- Informasi Kantor Desa --}}
                <x-ui.cards.card class="relative p-7 lg:col-span-2">
                    {{-- Aksen --}}
                    <div
                        class="absolute right-0 top-0 h-1 w-full bg-gradient-to-r from-primary via-primary/70 to-accent">
                    </div>
                    <div class="absolute -right-10 -bottom-10 size-36 rounded-full bg-secondary/5"></div>
                    <div class="absolute -right-4 -bottom-4 size-24 rounded-full border border-secondary/10"></div>

                    {{-- Header Teks --}}
                    <div class="flex items-start gap-4">
                        <div
                            class="flex size-12 shrink-0 items-center justify-center
                           rounded-xl bg-primary/10 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold leading-tight">
                                Kantor Pemerintah Desa
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Informasi alamat dan kontak resmi pemerintahan desa.
                            </p>
                        </div>
                    </div>

                    {{-- Informasi --}}
                    <div class="mt-6 space-y-4">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.25 9.75 16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                            </svg>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider">
                                    Kode Desa
                                </p>
                                <p class="mt-1 text-sm leading-tight text-gray-600">
                                    {{ $villageProfile->code }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            <div>
                                <address class="text-xs font-semibold uppercase tracking-wider">
                                    Alamat
                                </address>
                                <address class="mt-1 text-sm leading-tight text-gray-600">
                                    {{ $villageProfile->address }},
                                    {{ $villageProfile->village }},
                                    {{ $villageProfile->district }},
                                    {{ $villageProfile->regency }},
                                    {{ $villageProfile->province }},
                                    {{ $villageProfile->postal_code }}
                                </address>
                            </div>
                        </div>

                        {{-- Telepon --}}
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider">
                                    Telepon
                                </p>
                                <a href="tel:{{ $villageProfile->phone }}"
                                    class="mt-1 inline-block text-sm font-medium
                                       text-gray-600 leading-tight transition hover:text-primary">
                                    {{ $villageProfile->phone }}
                                </a>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider">
                                    Email
                                </p>
                                <a href="mailto:{{ $villageProfile->email }}"
                                    class="mt-1 inline-block break-all text-sm
                                       font-medium text-gray-600 leading-tight
                                       transition hover:text-primary">
                                    {{ $villageProfile->email }}
                                </a>
                            </div>
                        </div>

                        {{-- Website --}}
                        <a href="{{ $villageProfile->website }}"
                            class="inline-flex justify-center items-center px-3 py-2 bg-accent text-sm font-semibold rounded-lg transition duration-200 hover:bg-primary hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                            </svg>
                            Kunjungi Website</a>
                    </div>
                </x-ui.cards.card>

                {{-- Lokasi Kantor Desa --}}
                <div
                    class="group relative overflow-hidden rounded-2xl bg-secondary shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative h-96 w-full overflow-hidden">
                        <iframe src="{{ $villageProfile->maps }}" class="absolute inset-0 size-full border-0"
                            loading="lazy" allowfullscreen referrerpolicy="strict-origin-when-cross-origin">
                        </iframe>
                    </div>
                </div>
            </div>

            {{-- Media Sosial --}}
            <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-secondary">
                            Media Sosial Desa
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Ikuti media sosial resmi desa untuk mendapatkan informasi terbaru.
                        </p>
                    </div>
                    <span
                        class="hidden rounded-full bg-primary/10 px-3 py-1
                         text-xs font-semibold text-primary sm:inline-block">
                        Official Social Media
                    </span>
                </div>
                <div class="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-4">
                    {{-- YouTube --}}
                    <a href="{{ $villageProfile->youtube }}" target="_blank" rel="noopener noreferrer"
                        class="group flex items-center gap-3 rounded-xl
                           border border-gray-200 p-4 transition
                           hover:border-primary/30 hover:bg-primary/5">
                        <div
                            class="flex size-10 shrink-0 items-center justify-center
                                rounded-lg bg-red-50 text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="size-4 lg:size-5">
                                <path
                                    d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1C24 15.9 24 12 24 12s0-3.9-.5-5.8ZM9.6 15.6V8.4l6.2 3.6-6.2 3.6Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs lg:text-sm font-semibold text-gray-800">YouTube</p>
                            <p class="text-xs text-gray-400">Video & informasi</p>
                        </div>
                    </a>

                    {{-- TikTok --}}
                    <a href="{{ $villageProfile->tiktok }}" target="_blank" rel="noopener noreferrer"
                        class="group flex items-center gap-3 rounded-xl
                           border border-gray-200 p-4 transition
                           hover:border-primary/30 hover:bg-primary/5">
                        <div
                            class="flex size-10 shrink-0 items-center justify-center
                                rounded-lg bg-gray-100 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="size-4 lg:size-5">
                                <path
                                    d="M19.6 6.3a6.2 6.2 0 0 1-3.8-1.3v8.2a6.1 6.1 0 1 1-6.1-6.1c.4 0 .8 0 1.2.1v3.4a2.7 2.7 0 1 0 1.9 2.6V0h3.3c.3 2.4 1.8 4.3 4.2 4.8v1.5Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs lg:text-sm font-semibold text-gray-800">TikTok</p>
                            <p class="text-xs text-gray-400">Video terbaru</p>
                        </div>
                    </a>

                    {{-- Instagram --}}
                    <a href="{{ $villageProfile->instagram }}" target="_blank" rel="noopener noreferrer"
                        class="group flex items-center gap-3 rounded-xl
                           border border-gray-200 p-4 transition
                           hover:border-primary/30 hover:bg-primary/5">
                        <div
                            class="flex size-10 shrink-0 items-center justify-center
                                rounded-lg bg-pink-50 text-pink-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4 lg:size-5">
                                <rect width="18" height="18" x="3" y="3" rx="5" />
                                <circle cx="12" cy="12" r="4" />
                                <path stroke-linecap="round" d="M17.5 6.5h.01" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs lg:text-sm font-semibold text-gray-800">Instagram</p>
                            <p class="text-xs text-gray-400">Foto & kegiatan</p>
                        </div>
                    </a>

                    {{-- Facebook --}}
                    <a href="{{ $villageProfile->facebook }}" target="_blank" rel="noopener noreferrer"
                        class="group flex items-center gap-3 rounded-xl
                           border border-gray-200 p-4 transition
                           hover:border-primary/30 hover:bg-primary/5">
                        <div
                            class="flex size-10 shrink-0 items-center justify-center
                                rounded-lg bg-blue-50 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="size-4 lg:size-5">
                                <path
                                    d="M13.5 21v-8.2h2.8l.4-3.2h-3.2v-2c0-.9.3-1.5 1.6-1.5h1.7V3.2c-.3 0-1.3-.2-2.5-.2-2.5 0-4.2 1.5-4.2 4.4v2.2H7.3v3.2h2.8V21h3.4Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs lg:text-sm font-semibold text-gray-800">Facebook</p>
                            <p class="text-xs text-gray-400">Berita & informasi</p>
                        </div>
                    </a>
                </div>
            </div>
        </x-layouts.container>
    </div>

</x-layouts.public>
