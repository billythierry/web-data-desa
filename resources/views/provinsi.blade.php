@extends('layouts.main')

@section('title', 'Data Provinsi')

@section('content')
    <style>
        canvas {
        max-width: 400px;  /* lebar maksimum */
        max-height: 250px; /* tinggi maksimum */
        margin: 20px auto;
        display: block;
        }
    </style>

    <div class="container">
        <h1>Data Provinsi</h1>

        <!-- Elemen ini hanya menyimpan data -->
        <div id="dashboardData"
            data-provinsi='@json($provinsi)'>
        </div>

        <canvas id="chartProvinsi" width="400" height="200"></canvas>
    </div>

    <div class='search-section'>
        <h2>Cari Data Provinsi</h2>
        <p>Masukkan nama provinsi untuk mencari data</p>

        <form class="search-box" action="{{ url('/provinsi/cariprovinsi') }}" method="GET">
            <input type="text" name="cari" placeholder="Masukkan Nama Provinsi..." value="{{ request('cari') }}" required>
            <input type="submit" value="CARI">
        </form>
    </div>

    @if(isset($dataProvinsi) && count($dataProvinsi) > 0)
        <div class='result-section'>
            <h3>Hasil Pencarian:</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Provinsi</th>
                        <th>Jumlah Domain Desa Konflik</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataProvinsi as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->provinsi }}</td>
                        <td>{{ $d->jumlah_domain_konflik }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $dataProvinsi->links() }}
        </div>
        @elseif(request()->has('cari'))
        <div class='result-section' style='text-align:center'>
            <p>Tidak ada hasil ditemukan untuk "{{ request('cari') }}"</p>
        </div>
    @endif

        

    {{-- Memanggil file JS di public/js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/provinsi.js') }}"></script>
@endsection
