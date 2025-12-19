@extends('layouts.main')

@section('title', 'Data Kecamatan')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kecamatan.css') }}">

<div class="container">
    <h1>Data Kecamatan</h1>

    <!-- Data grafik -->
    <div id="dashboardData"
        <div id="dashboardData"
            data-chart='@json($kecamatan)'>
        </div>
    </div>

    <canvas id="chartKecamatan" width="400" height="200"></canvas>
</div>

<div class="search-section">
    <h2>Cari Kecamatan</h2>
    <p>Mencari data desa berdasarkan nama kecamatan</p>

    <form class="search-box" action="{{ url('/kecamatan/carikecamatan') }}" method="GET">
        <input type="text" name="cari" placeholder="Masukkan Nama Kecamatan..."
            value="{{ $cari ?? '' }}" required>
        <input type="submit" value="CARI">
    </form>
</div>

@if($dataKecamatan && count($dataKecamatan) > 0)
    <div class="result-section">
        <h3>
            Hasil pencarian untuk
            "{{ $cari }}"
            Ditemukan
            <strong>{{ $dataKecamatan->total() }}</strong> desa dengan total
            <strong>{{ $totalDomainKonflik }}</strong> domain konflik
        </h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th>Kota / Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataKecamatan as $d)
                <tr>
                    <td>{{ ($dataKecamatan->firstItem() ?? 0) + $loop->index }}</td>
                    <td>{{ $d->kecamatan }}</td>
                    <td>{{ $d->nama_desa }}</td>
                    <td>{{ $d->kota_kabupaten }}</td>
                    <td>{{ $d->provinsi }}</td>
                    <td>{{ $d->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $dataKecamatan->onEachSide(1)->links('pagination.simple-custom') }}
    </div>

@elseif(request()->has('cari'))
    <div class="result-section" style="text-align:center;">
        <p><strong>Tidak ada hasil ditemukan untuk "{{ $cari }}"</strong></p>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/kecamatan.js') }}"></script>
@endsection
