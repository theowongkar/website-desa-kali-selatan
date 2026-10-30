<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Metadata --}}
    <meta name="description"
        content="Website informasi dan pelayanan digital desa yang menyediakan informasi mengenai profil desa, berita dan pengumuman, serta data kependudukan.">
    <meta name="keywords" content="Portal Kali Selatan, sistem informasi desa">
    <meta name="author" content="Desa Kali Selatan">

    {{-- Logo dan Judul Halaman --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/minahasa-logo.png') }}" type="image/x-icon">
    <title>{{ $title . ' | ' . config('app.name') ?? config('app.name') }}</title>

    {{-- Styles / Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans">
    <div class="flex flex-col min-h-screen">
        {{-- Navbar --}}
        <nav class="sticky top-0 z-30 border-b border-gray-600 bg-primary/95 shadow-lg" x-data="{ open: false }" x-cloak>
            <div aria-label="Navigasi utama" class="container mx-auto py-2 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    {{-- Logo dan Identitas Desa --}}
                    <a href="{{ route('home') }}" class="flex items-center gap-2"
                        aria-label="Beranda Desa Kali Selatan">
                        <img src="{{ asset('assets/images/minahasa-logo.png') }}" alt="Logo Desa Kali Selatan"
                            class="size-10 object-contain">
                        <div class="flex flex-col">
                            <span class="truncate text-sm font-bold tracking-tight leading-tight text-white sm:text-md">
                                Desa Kali Selatan
                            </span>
                            <span class="text-xs text-gray-200">
                                Kabupaten Minahasa
                            </span>
                        </div>
                    </a>

                    {{-- Tombol Hamburger: Mobile --}}
                    <button type="button" @click="open = !open" :aria-expanded="open.toString()"
                        aria-controls="main-menu" :aria-label="open ? 'Tutup menu navigasi' : 'Buka menu navigasi'"
                        class="inline-flex size-10 shrink-0 items-center justify-center
                           rounded-lg text-white transition focus:outline-none focus:ring-2 focus:ring-red-600 lg:hidden">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>

                    {{-- Menu Navigasi --}}
                    <div id="main-menu" :class="open ? 'block' : 'hidden'"
                        class="absolute left-0 right-0 top-full px-4 py-4 bg-white shadow-lg
                        lg:static lg:block lg:border-0 lg:bg-transparent
                        lg:p-0 lg:shadow-none">
                        <ul class="flex flex-col gap-4 lg:flex-row lg:items-center">
                            <li @click="open = false">
                                <a href="{{ route('home') }}"
                                    class="block
                                  font-medium text-primary text-sm lg:text-gray-100
                                  lg:bg-transparent lg:hover:opacity-80 transition duration-200 {{ Route::is('home') ? 'animate-pulse' : 'border-transparent text-primary lg:text-gray-100' }}">
                                    Beranda
                                </a>
                            </li>
                            <li @click="open = false">
                                <a href="#"
                                    class="block
                                  font-medium text-primary text-sm lg:text-gray-100
                                  lg:bg-transparent lg:hover:opacity-80 transition duration-200 {{ Route::is('#') ? 'animate-pulse' : 'border-transparent text-primary lg:text-gray-100' }}">
                                    Profil Desa
                                </a>
                            </li>
                            <li @click="open = false">
                                <a href="#"
                                    class="block
                                  font-medium text-primary text-sm lg:text-gray-100
                                  lg:bg-transparent lg:hover:opacity-80 transition duration-200 {{ Route::is('#') ? 'animate-pulse' : 'border-transparent text-primary lg:text-gray-100' }}">
                                    Infografis
                                </a>
                            </li>
                            <li @click="open = false">
                                <a href="#"
                                    class="block
                                  font-medium text-primary text-sm lg:text-gray-100
                                  lg:bg-transparent lg:hover:opacity-80 transition duration-200 {{ Route::is('#') ? 'animate-pulse' : 'border-transparent text-primary lg:text-gray-100' }}">
                                    Postingan
                                </a>
                            </li>
                            <li @click="open = false">
                                <a href="#"
                                    class="flex items-center justify-center rounded-full
                                  bg-accent px-4 py-1 font-bold text-sm
                                  text-secondary transition hover:bg-secondary hover:text-accent">
                                    Login
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Layout Utama --}}
        <main class="flex-1">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <footer class="bg-secondary text-white">
            <div class="container mx-auto pt-10 pb-5 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-10 md:grid-cols-2
                    lg:grid-cols-5 lg:gap-14">
                    {{-- Identitas desa --}}
                    <section aria-labelledby="footer-identitas-desa" class="flex md:col-span-2">
                        <img src="{{ asset('assets/images/minahasa-logo.png') }}" alt="Logo Desa Kali Selatan"
                            loading="lazy" class="size-24 md:size-26 lg:size-30 shrink-0 object-contain">
                        <div>
                            <h2 class="mb-2 text-lg font-bold">
                                Pemerintah Desa Kali Selatan
                            </h2>
                            <address class="text-sm not-italic leading-6">
                                Desa Kali Selatan, Kecamatan Pineleng, Kabupaten Minahasa, Provinsi Sulawesi Utara |
                                95662
                            </address>
                            <p class="mt-2 text-sm leading-6">
                                <strong>Kode Wilayah:</strong>
                                71.02.13.2016
                            </p>
                        </div>
                    </section>

                    {{-- Hubungi Kami --}}
                    <section aria-labelledby="footer-hubungi-kami">
                        <h2 class="mb-4 text-lg font-bold">
                            Hubungi Kami
                        </h2>
                        <ul class="space-y-5 text-sm">
                            <li>
                                <a href="#" class="flex items-center gap-2 transition hover:opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24">
                                        <title>baseline-whatsapp</title>
                                        <path fill="currentColor"
                                            d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28" />
                                    </svg>
                                    082158889999
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 transition hover:opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24">
                                        <title>outline-email</title>
                                        <path fill="currentColor"
                                            d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z" />
                                    </svg>
                                    kaliselatan@gmail.com
                                </a>
                            </li>
                            <li class="flex flex-wrap gap-2">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24">
                                        <title>youtube</title>
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5">
                                            <path
                                                d="M2 12c0-3.3 0-4.95 1.464-5.975C4.93 5 7.286 5 12 5s7.071 0 8.535 1.025S22 8.7 22 12s0 4.95-1.465 5.975C19.072 19 16.714 19 12 19s-7.071 0-8.536-1.025S2 15.3 2 12" />
                                            <path
                                                d="M10.5 9.908v4.184a.41.41 0 0 0 .412.408a.4.4 0 0 0 .228-.068l3.175-2.074a.405.405 0 0 0 .003-.678l-3.175-2.11a.415.415 0 0 0-.573.11a.4.4 0 0 0-.07.228" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24">
                                        <title>tiktok</title>
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5"
                                            d="M20.2 10.1c0 .22-.18.401-.4.39a8 8 0 0 1-3.362-.93c-.281-.15-.638.045-.638.364V15.5a6 6 0 1 1-6.4-5.987a.38.38 0 0 1 .4.387v2.8c0 .22-.18.397-.398.433A2.4 2.4 0 1 0 12.2 15.5V2.9a.4.4 0 0 1 .4-.4h2.8a.43.43 0 0 1 .418.4a4.4 4.4 0 0 0 3.983 3.982c.22.02.4.197.4.418z" />
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24">
                                        <title>instagram</title>
                                        <path fill="currentColor"
                                            d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24">
                                        <title>facebook</title>
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5"
                                            d="M6.5 10v4h3v7h4v-7h3l1-4h-4V8c0-.545.455-1 1-1h3V3h-3c-2.723 0-5 2.277-5 5v2z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </section>

                    {{-- Navigasi --}}
                    <section aria-labelledby="footer-navigasi">
                        <h2 class="mb-4 text-lg font-bold">
                            Navigasi
                        </h2>
                        <ul class="space-y-2 text-sm">
                            <li>
                                <a href="{{ route('home') }}" class="transition hover:opacity-75">
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a href="#" class="transition hover:opacity-75">
                                    Profil Desa
                                </a>
                            </li>
                            <li>
                                <a href="#" class="transition hover:opacity-75">
                                    Infografis
                                </a>
                            </li>
                            <li>
                                <a href="#" class="transition hover:opacity-75">
                                    Postingan
                                </a>
                            </li>
                        </ul>
                    </section>

                    {{-- Jelajahi --}}
                    <section aria-labelledby="footer-jelajahi">
                        <h2 class="mb-4 text-lg font-bold">
                            Jelajahi
                        </h2>
                        <ul class="space-y-2 text-sm">
                            <li>
                                <a href="https://kemendesa.go.id/" target="_blank"
                                    class="transition hover:opacity-75">
                                    Website Kemendesa
                                </a>
                            </li>
                            <li>
                                <a href="https://kemendagri.go.id/" target="_blank"
                                    class="transition hover:opacity-75">
                                    Website Kemendagri
                                </a>
                            </li>
                            <li>
                                <a href="https://minahasa.go.id/situs/" target="_blank"
                                    class="transition hover:opacity-75">
                                    Website Kabupaten Minahasa
                                </a>
                            </li>
                        </ul>
                    </section>
                </div>

                {{-- Copyright --}}
                <div class="mt-8 border-t border-white/20 pt-5">
                    <p class="text-center text-xs leading-5 text-white/80">
                        &copy; {{ date('Y') }}
                        Pemerintah Desa Kali Selatan.
                        Hak cipta dilindungi.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
