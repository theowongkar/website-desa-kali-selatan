<x-layouts.public>

    {{-- Judul Halaman --}}
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Halaman Home --}}
    <div
        class="bg-[radial-gradient(ellipse_at_top_left,rgba(178,34,34,0.1),transparent_50%),radial-gradient(ellipse_at_bottom_right,rgba(212,175,55,0.3),transparent_50%),radial-gradient(rgba(156,163,175,0.3)_1px,transparent_1px)] [background-size:auto,auto,20px_20px]">
        {{-- Hero Image --}}
        <section>
            <div x-data="{ active: 0 }" class="relative h-[calc(100svh-50px)] w-full overflow-hidden">
                {{-- Gambar --}}
                @forelse ($villageBanners as $villageBanner)
                    <div x-show="active === {{ $loop->index }}" class="absolute inset-0">
                        <img src="{{ $villageBanner->image_path
                            ? asset('storage/' . $villageBanner->image_path)
                            : asset('assets/images/image-placeholder.jpg') }}"
                            alt="{{ $villageBanner->title ?? 'Banner Desa Kali Selatan' }}"
                            class="h-full w-full object-cover">
                        <div class="absolute inset-0 bg-black/50"></div>
                    </div>
                @empty
                    <div class="absolute inset-0">
                        <img src="{{ asset('assets/images/image-placeholder.jpg') }}" alt="Banner Desa Kali Selatan"
                            class="h-full w-full object-cover">

                        <div class="absolute inset-0 bg-black/50"></div>
                    </div>
                @endforelse

                {{-- Judul --}}
                <div class="absolute inset-0 z-10 flex flex-col items-center justify-center px-6">
                    <span
                        class="text-xl font-light text-white uppercase tracking-widest sm:text-3xl lg:text-4xl">Sitemandesa</span>
                    <h1 class="mt-1 mb-3 text-2xl font-bold text-white uppercase sm:text-4xl lg:text-5xl">
                        Desa Kali Selatan
                    </h1>
                    <i class="text-sm font-light text-white sm:text-xl lg:text2xl">Perluas Jangkauan,
                        Lakukan Percepatan Pelayanan Dengan
                        <span
                            class="inline-block px-2 py-0.5 bg-primary text-xs font-medium rounded-lg sm:text-lg lg:text-xl">smart
                            system
                            terintegrasi</span></i>
                </div>

                {{-- Tombol Navigasi --}}
                @if ($villageBanners->count() > 1)
                    <button
                        @click="active = (active - 1 + {{ $villageBanners->count() }}) % {{ $villageBanners->count() }}"
                        type="button"
                        class="absolute left-3 top-1/2 z-20 -translate-y-1/2 rounded-full bg-primary/40 p-2 text-secondary cursor-pointer"
                        aria-label="Tombol Sebelumnya">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                    </button>
                    <button @click="active = (active + 1) % {{ $villageBanners->count() }}"
                        class="absolute right-3 top-1/2 z-20 -translate-y-1/2 rounded-full bg-primary/40 p-2 text-secondary cursor-pointer"
                        aria-label="Tombol Selanjutnya">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                    <div class="absolute bottom-4 left-1/2 z-20 flex -translate-x-1/2 gap-3">
                        @foreach ($villageBanners as $banner)
                            <button @click="active = {{ $loop->index }}" type="button"
                                class="size-2 rounded-full cursor-pointer"
                                :class="active === {{ $loop->index }} ? 'bg-primary' : 'bg-primary/50'"
                                aria-label="Tombol Dot"></button>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        {{-- Jelajahi Desa --}}
        <x-layouts.container>
            <div class="grid gap-8 md:grid-cols-5 md:gap-10">
                {{-- Header Content --}}
                <div class="md:col-span-2 flex flex-col justify-center">
                    <x-ui.texts.public-title title="Jelajahi Desa" />
                    <x-ui.texts.public-paragraph
                        content="Melalui website ini Anda dapat menjelajahi segala hal yang
                            terkait dengan Desa. Aspek pemerintahan, penduduk,
                            demografi, potensi Desa, dan juga berita tentang Desa." />
                </div>

                {{-- Isi Content --}}
                <div class="md:col-span-3">
                    <div class="grid grid-cols-2 gap-5">
                        <a href="#"
                            class="group overflow-hidden flex flex-col items-center justify-center
                              rounded-xl bg-white p-5 shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1
                              hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-20 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                            </svg>
                            <span class="mt-4 font-semibold uppercase">
                                Profil Desa
                            </span>
                        </a>
                        <a href="#"
                            class="group overflow-hidden flex flex-col items-center justify-center
                              rounded-xl bg-white p-5 shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1
                              hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-20 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                            </svg>
                            <span class="mt-4 font-semibold uppercase">
                                Infografis
                            </span>
                        </a>
                        <a href="#"
                            class="group overflow-hidden flex flex-col items-center justify-center
                              rounded-xl bg-white p-5 shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1
                              hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-20 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>

                            <span class="mt-4 font-semibold uppercase">
                                Formulir Online
                            </span>
                        </a>
                        <a href="#"
                            class="group overflow-hidden flex flex-col items-center justify-center
                              rounded-xl bg-white p-5 shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1
                              hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-20 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <span class="mt-4 font-semibold uppercase">
                                PPID
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </x-layouts.container>

        {{-- Sambutan Kepala Desa --}}
        <x-layouts.container>
            <div class="grid gap-8 md:grid-cols-5 md:gap-10">
                {{-- Foto Kepala Desa --}}
                <div class="md:col-span-2">
                    <div class="w-full h-96 overflow-hidden rounded-xl shadow-lg">
                        <img src="{{ $villageHead->photo_path
                            ? asset('storage/' . $villageHead->photo_path)
                            : asset('assets/images/profile-placeholder.jpg') }}"
                            alt="Foto {{ $villageHead->name }}"
                            class="w-full h-full object-cover object-center transition duration-500 hover:scale-105">
                    </div>
                </div>

                {{-- Teks Kepala Desa --}}
                <div class="md:col-span-3">
                    <span class="inline-block rounded-full bg-accent px-4 py-1.5 text-sm font-semibold">
                        Sambutan
                    </span>
                    <h2 class="my-4 text-2xl font-bold text-primary lg:text-3xl">
                        Sambutan Kepala Desa {{ $villageProfile->village }}
                    </h2>
                    <div class="h-1 w-16 rounded-full bg-primary"></div>
                    <div class="mt-5">
                        <h3 class="text-xl font-semibold">
                            {{ $villageHead->name }}
                        </h3>
                        <p class="mt-1 text-sm font-medium text-gray-800">
                            {{ $villageHead->position }} {{ $villageProfile->village }}
                        </p>
                    </div>
                    <div class="mt-5 rounded-lg border-l-4 border-primary bg-primary/4 p-5">
                        <x-ui.texts.public-paragraph
                            content="Website ini hadir sebagai wujud transformasi desa
                                {{ $villageProfile->village }} menjadi desa yang
                                mampu memanfaatkan teknologi informasi dan komunikasi,
                                terintegrasi ke dalam sistem online.
                                Keterbukaan informasi publik, pelayanan publik,
                                dan kegiatan perekonomian desa diharapkan mampu
                                mewujudkan desa sebagai desa wisata yang
                                berkelanjutan, adaptif terhadap perubahan iklim,
                                serta menjadi desa yang mandiri." />
                    </div>
                </div>
            </div>
        </x-layouts.container>

        {{-- Peta Desa --}}
        <x-layouts.container>
            {{-- Header Konten --}}
            <div class="flex flex-col justify-center items-center mb-5 text-center">
                <x-ui.texts.public-title title="Peta Desa" />
                <x-ui.texts.public-paragraph
                    content="Menampilkan Peta Desa Dengan Interest Point Desa {{ $villageProfile->village }}." />
            </div>

            {{-- Isi Konten --}}
            <div
                class="group relative w-full overflow-hidden rounded-2xl border border-gray-200 bg-white p-2 shadow-lg">
                <div class="w-full h-80 overflow-hidden rounded-xl sm:h-96">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.157319852179!2d124.84343986947964!3d1.3988471406173326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328773be092a4cd9%3A0xe0618459624f7b36!2sKantor%20Desa%20Kali%20Selatan!5e0!3m2!1sid!2sid!4v1793114809492!5m2!1sid!2sid"
                        class="w-full h-full border-0" loading="lazy" allowfullscreen
                        referrerpolicy="strict-origin-when-cross-origin">
                    </iframe>
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
                    lg:grid-cols-4">
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
                            <div
                                class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/50 to-transparent">
                            </div>
                        </div>
                        {{-- Informasi --}}
                        <div class="p-5 text-center">
                            <h3
                                class="text-lg font-bold
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

            {{-- Selengkapnya --}}
            <div class="mt-6 flex justify-center">
                <a href="#" class="flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="text-sm font-semibold leading-6 uppercase sm:text-base">Lihat struktur lebih
                        lengkap</span>
                </a>
            </div>
        </x-layouts.container>

        {{-- Infografis Penduduk --}}
        <x-layouts.container>
            {{-- Header Konten --}}
            <div class="flex flex-col mb-5">
                <x-ui.texts.public-title title="Infografis Penduduk" />
                <x-ui.texts.public-paragraph
                    content="Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi terkait dengan kependudukan dan pendayagunaannya untuk pelayanan publik yang efektif dan efisien." />
            </div>

            {{-- Isi Konten --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Penduduk --}}
                <div
                    class="grid grid-cols-[40%_60%] min-h-14 bg-gray-100 overflow-hidden rounded-md shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1 hover:shadow-md">
                    <span
                        class="flex items-center justify-center bg-gradient-to-r from-primary to-primary/65 text-white text-3xl font-bold">
                        {{ $totalResidents }}
                    </span>
                    <h3 class="flex items-center justify-center text-lg font-bold text-center px-2">
                        Penduduk
                    </h3>
                </div>

                {{-- Laki-Laki --}}
                <div
                    class="grid grid-cols-[40%_60%] min-h-14 bg-gray-100 overflow-hidden rounded-md shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1 hover:shadow-md">
                    <span
                        class="flex items-center justify-center bg-gradient-to-r from-primary to-primary/65 text-white text-3xl font-bold">
                        {{ $totalMaleResidents }}
                    </span>
                    <h3 class="flex items-center justify-center text-lg font-bold text-center px-2">
                        Laki-Laki
                    </h3>
                </div>

                {{-- Kepala Keluarga --}}
                <div
                    class="grid grid-cols-[40%_60%] min-h-14 bg-gray-100 overflow-hidden rounded-md shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1 hover:shadow-md">
                    <span
                        class="flex items-center justify-center bg-gradient-to-r from-primary to-primary/65 text-white text-3xl font-bold">
                        {{ $totalHeadOfFamily }}
                    </span>
                    <h3 class="flex items-center justify-center text-lg font-bold text-center px-2">
                        Kepala Keluarga
                    </h3>
                </div>

                {{-- Perempuan --}}
                <div
                    class="grid grid-cols-[40%_60%] min-h-14 bg-gray-100 overflow-hidden rounded-md shadow-sm ring-1 ring-gray-200 transition duration-300 hover:-translate-y-1 hover:shadow-md">
                    <span
                        class="flex items-center justify-center bg-gradient-to-r from-primary to-primary/65 text-white text-3xl font-bold">
                        {{ $totalFemaleResidents }}
                    </span>
                    <h3 class="flex items-center justify-center text-lg font-bold text-center px-2">
                        Perempuan
                    </h3>
                </div>
            </div>
        </x-layouts.container>

        {{-- Postingan --}}
        <x-layouts.container>
            {{-- Header Konten --}}
            <div class="flex flex-col justify-center items-center mb-5 text-center">
                <x-ui.texts.public-title title="Postingan" />
                <x-ui.texts.public-paragraph
                    content="Menyajikan informasi terbaru tentang peristiwa, berita terkini, dan artikel-artikel jurnalistik dari Desa {{ $villageProfile->village }}" />
            </div>

            {{-- Isi Konten --}}
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($posts as $post)
                    <x-ui.cards.post-card :post="$post" class="h-full" />
                @empty
                    <x-ui.alerts.empty-state title="Belum ada postingan" message="Postingan desa belum tersedia."
                        class="col-span-full" />
                @endforelse
            </div>
        </x-layouts.container>
    </div>

</x-layouts.public>
