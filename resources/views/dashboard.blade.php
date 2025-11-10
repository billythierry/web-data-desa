@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Dashboard Konflik</h1>

    <!-- Elemen ini hanya menyimpan data -->
    <div id="dashboardData"
        data-provinsi='@json($provinsi)'
        data-kabupaten='@json($kabupaten)'
        data-kecamatan='@json($kecamatan)'>
    </div>

    <canvas id="chartProvinsi" width="400" height="200"></canvas>
    <canvas id="chartKabupaten" width="400" height="200"></canvas>
    <canvas id="chartKecamatan" width="400" height="200"></canvas>
</div>

{{-- Memanggil file JS di public/js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
