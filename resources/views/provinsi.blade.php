@extends('layouts.main')

@section('title', 'Data Provinsi')

@section('content')
    <link href="{{ asset('css/provinsi.css') }}" rel="stylesheet">

    @if($provinsi)
        <div class="container">
            <h1>Data Provinsi</h1>

            <div id="dashboardData" 
                data-chart='@json($isSearching ? $dataProvinsiForChart : $provinsi)'
                data-mode='{{ $isSearching ? "kabupaten" : "provinsi" }}'>
            </div>

            <canvas id="chartProvinsi" width="400" height="200"></canvas>
        </div>
    @endif


    {{-- Pencarian --}}
    <div class="search-section">
        <h2>Cari Data Provinsi</h2>
        <p>Masukkan nama provinsi untuk mencari data domain konflik</p>

        <form class="search-box" action="{{ url('/provinsi/cariprovinsi') }}" method="GET">
            <input type="text" name="cari" placeholder="Masukkan Nama Provinsi..."
                value="{{ request('cari') }}" required>
            <input type="submit" value="CARI">
        </form>
    </div>


    {{-- Hasil pencarian --}}
    @if(isset($dataProvinsi) && count($dataProvinsi) > 0)
        <div class="result-section">
            <h3>
                Hasil Pencarian untuk "{{ $cari }}"
                sebanyak {{ $dataProvinsi->total() }} kabupaten/kota
                dengan total {{ number_format($totalDomainKonflik) }} domain
            </h3>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kota / Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Jumlah Domain Konflik</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataProvinsi as $d)
                    <tr>
                        <td>{{ ($dataProvinsi->firstItem() ?? 0) + $loop->index }}</td>
                        <td>{{ $d->kota_kabupaten }}</td>
                        <td>{{ $d->provinsi }}</td>
                        <td>{{ $d->jumlah_domain_konflik }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $dataProvinsi->onEachSide(1)->links('pagination.simple-custom') }}

        </div>

    @elseif(request()->has('cari'))
        <div class="result-section" style="text-align:center;">
            <p><strong>Tidak ada hasil ditemukan untuk "{{ $cari }}"</strong></p>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/provinsi.js') }}"></script>

@endsection

