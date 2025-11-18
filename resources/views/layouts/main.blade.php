<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cari Data Desa')</title>
    <link rel="icon" type="image/png" href="{!! asset('images/logo_radnet.png') !!}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    
</head>
<body>
    <nav>
        <!-- <img src="{{ asset('images/logo_radnet.png') }}" alt="Logo Radnet"> -->
        <a href="{{ url('/') }}">Beranda</a>
        <a href="{{ url('/desa') }}">Data Desa</a>
        <a href="{{ url('/kecamatan') }}">Kecamatan</a>
        <a href="{{ url('/kotakabupaten') }}">Kota/Kabupaten</a>
        <a href="{{ url('/provinsi') }}">Provinsi</a>
        <a href="{{ url('/tentang') }}">Tentang</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; Copyright PT Radnet Digital Indonesia © 2025. All Right Reserved.</p>
    </footer>
</body>
</html>
