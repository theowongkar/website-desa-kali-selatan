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

</head>

<body>
    {{ $slot }}
</body>

</html>
