<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cari Data Desa')</title>

    <style>
        html, body{
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f9f9fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        nav {
            background-color: #0d6efd;
            padding: 15px 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            flex: 1;
            padding: 40px;
        }

        footer{
            background-color: #0d6efd;
            color: white;
            text-align: center;
            padding: 15px 10px;
            font-size: 14px;

        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/kecamatan') }}">Kecamatan</a>
        <a href="{{ url('/kabupaten') }}">Kota/Kabupaten</a>
        <a href="{{ url('/provinsi') }}">Provinsi</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Cari Data Desa. All rights reserved.</p>
    </footer>
</body>
</html>
