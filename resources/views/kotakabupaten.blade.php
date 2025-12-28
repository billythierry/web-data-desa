@extends('layouts.main')

@section('title', 'Data Kota/Kabupaten')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kotakabupaten.css') }}">

<div class="container">
    <h1>Data Kota / Kabupaten</h1>

    <!-- Data grafik -->
    <div id="dashboardData"
        data-chart='@json($isSearching ? $dataKotaKabupatenForChart : $kotakabupaten)'
        data-mode='{{ $isSearching ? "hasil" : "kotakabupaten" }}'>
    </div>

    <canvas id="chartKotaKabupaten" width="400" height="200"></canvas>
</div>

<div class="search-section">
    <h2>Cari Kota / Kabupaten</h2>
    <p>Masukkan nama kota/kabupaten untuk mencari data domain konflik</p>

    <form class="search-box" action="{{ url('/kotakabupaten/carikotakabupaten') }}" method="GET">
        <input type="text" name="cari" placeholder="Masukkan Nama Kota/Kabupaten..."
            value="{{ $cari ?? '' }}" required>
        <input type="submit" value="CARI">
    </form>
</div>

@if($dataKotaKabupaten && count($dataKotaKabupaten) > 0)
    <div class="result-section">
        <h3>
            Hasil Pencarian untuk "{{ $cari }}"
            ditemukan <strong>{{ $dataKotaKabupaten->total() }}</strong> kecamatan
            <!-- dengan total <strong>{{ $totalDomainKonflik }}</strong> domain -->
        </h3>

        <table>
           <thead>
                <tr>
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>Provinsi</th>
                    <th>Jumlah Domain Konflik</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($dataKotaKabupaten as $item)
                <tr>
                    <td>{{ ($dataKotaKabupaten->firstItem() ?? 0) + $loop->index }}</td>
                    <td>{{ $item->kecamatan }}</td>
                    <td>{{ $item->provinsi }}</td>
                    <td>{{ $item->jumlah_domain_konflik }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="margin-top: 15px">
            {{ $dataKotaKabupaten->onEachSide(1)->links('pagination.simple-custom') }}
        </div>
    </div>

@elseif(request()->has('cari'))
    <div class="result-section" style="text-align:center;">
        <p><strong>Tidak ada hasil ditemukan untuk "{{ $cari }}"</strong></p>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/kotakabupaten.js') }}"></script>
@endsection
