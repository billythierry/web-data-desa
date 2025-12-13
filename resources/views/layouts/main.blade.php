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
        <div class="nav-left">
            @if(Auth::check())
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="7" r="5" stroke="#fff" stroke-width="2"/>
                    <path d="M4 21c0-4 3-7 8-7s8 3 8 7" stroke="#fff" stroke-width="2"/>
                </svg>
                {{ explode(' ', Auth::user()->nama_depan)[0] }}
            @endif
        </div>

        <div class="nav-right">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ url('/desa') }}">Data Desa</a>
            <a href="{{ url('/kecamatan') }}">Kecamatan</a>
            <a href="{{ url('/kotakabupaten') }}">Kota/Kabupaten</a>
            <a href="{{ url('/provinsi') }}">Provinsi</a>
            <a href="{{ url('/tentang') }}">Tentang</a>
            <a href="#" onclick="openLogoutModal()">Logout</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <div id="logoutModal" class="modal" style="
        display:none; 
        position: fixed;
        z-index: 9999;
        left: 0; top: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
    ">
        <div style="
            background: white;
            padding: 25px;
            border-radius: 12px;
            width: 350px;
            text-align: center;
            box-shadow: 0px 8px 18px rgba(0,0,0,0.3);
        ">
            <h3 style="margin-bottom: 15px;">Konfirmasi Logout</h3>
            <p>Apakah Anda yakin ingin keluar dari akun?</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="
                    padding: 10px 20px;
                    background: #e74c3c;
                    border: none;
                    color: white;
                    border-radius: 8px;
                    cursor: pointer;
                    margin-top: 20px;
                ">Ya, Logout</button>
            </form>

            <button onclick="closeLogoutModal()" style="
                padding: 10px 20px;
                background: #95a5a6;
                border: none;
                color: white;
                border-radius: 8px;
                cursor: pointer;
                margin-top: 10px;
            ">Batal</button>
        </div>
    </div>

    <script>
        function openLogoutModal() {
            document.getElementById('logoutModal').style.display = 'flex';
        }
        function closeLogoutModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }
    </script>


    <!-- Footer -->
    <footer>
        <p>&copy; Copyright PT Radnet Digital Indonesia © 2025. All Right Reserved.</p>
    </footer>
</body>
</html>
