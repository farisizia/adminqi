<!DOCTYPE html>
<html lang="id">
<head>
    {{-- meta --}}
    <meta charset="utf-8">
    <meta content="initial-scale=1, width=device-width" name="viewport">
    {{-- meta --}}
    <title>@yield('judul')</title>
    {{-- font --}}
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
        rel="stylesheet"
    >
    {{-- font --}}
    {{-- css --}}
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    @stack('css')
    {{-- css --}}
</head>
@includeWhen(url()->current() === route('autentikasi.masuk'), 'struktur.tata-letak.autentikasi')
@includeUnless(url()->current() === route('autentikasi.masuk'), 'struktur.tata-letak.utama')
</html>
