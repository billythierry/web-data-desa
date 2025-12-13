@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<style>
    .welcome-header {
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('images/desadashboard.jpeg'); 
        background-size: cover; 
        background-position: center center; 
        min-height: 250px;
        padding: 20px; 
        margin-bottom: 20px; 
        border-radius: 12px;
        box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .welcome-header h1 {
        color: white; 
        font-size: 24;
        margin: 0; 
        text-shadow: 1px 1px 3px rgba(0,0,0,0.5); 
    }

    .dashboard-grid {
        display: grid;
        /* Default: 3 kolom di layar besar */
        grid-template-columns: repeat(3, 1fr); 
        gap: 20px;
        margin-top: 30px;
    }

    .card {
        padding: 25px;
        border-radius: 12px;
        color: white;
        font-family: Arial, sans-serif;
        height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }

    .title {
        font-size: 15px;
        opacity: 0.9;
    }

    .value {
        font-size: 32px;
        font-weight: bold;
    }

    .card-red { background: #ee6b75; }
    .card-yellow { background: #f6c103; }
    .card-blue { background: #69c0e3; }
    .card-darkblue { background: #1fa0d5; }
    .card-orange { background: #d84b36; }
    .card-grey { background: #e5e5e5; color:#444; }

    @media (max-width: 991px) {
        .dashboard-grid {
            /* Ubah menjadi 2 kolom */
            grid-template-columns: repeat(2, 1fr); 
        }
    }

    /* Untuk Layar Kecil (Ponsel, Lebar < 600px) */
    @media (max-width: 599px) {
        .dashboard-grid {
            /* Ubah menjadi 1 kolom penuh */
            grid-template-columns: 1fr; 
        }
    }
</style>

<div class="welcome-header">
    <h1>Selamat Datang di Website Pendataan Domain Desa</h1>    
</div>

<div class="dashboard-grid">

    <div class="card card-red">
        <div class="title">Jumlah Desa se-Indonesia</div>
        <div class="value">{{ number_format($jumlahDesaIndonesia, 0, ',', '.') ?? '-'}} </div>
    </div>

    <div class="card card-yellow">
        <div class="title">Jumlah Domain Desa Konflik</div>
        <div class="value">{{ number_format($jumlahDesaKonflik, 0, ',', '.') ?? '-' }} </div>
    </div>

    <div class="card card-blue">
        <div class="title">Provinsi dengan Konflik tertinggi</div>
        <div class="value">{{ $jumlahProvTertinggi->provinsi ?? '-'}} </div>
    </div>

    <div class="card card-darkblue">
        <div class="title">Kota/Kabupaten dengan Konflik Tertinggi</div>
        <div class="value">{{ $jumlahkotakabTertinggi->kota_kabupaten }}</div>
    </div>

    <div class="card card-orange">
        <div class="title">Kecamatan dengan Konflik tertinggi</div>
        <div class="value">{{ $jumlahkecTertinggi->kecamatan }}</div>
    </div>

</div>

@endsection
