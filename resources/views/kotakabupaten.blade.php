@extends('layouts.main')

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
    <h1>Data Kota/Kabupaten</h1>

    <!-- Elemen ini hanya menyimpan data -->
    <div id="dashboardData"
        data-kabupaten='@json($kabupaten)'>
    </div>

    <canvas id="chartKabupaten" width="400" height="200"></canvas>
</div>

{{-- Memanggil file JS di public/js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/kotakabupaten.js') }}"></script>
@endsection

