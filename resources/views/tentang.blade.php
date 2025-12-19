@extends('layouts.main')

@section('title', 'Tentang')

@section('content')
<style>
    .tentang-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px 30px;
        background-color: #f5f5f5;
        border-radius: 6px;
    }

    .tentang-container h1 {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #000;
    }

    .tentang-container p {
        font-size: 14px;
        line-height: 1.7;
        color: #333;
    }
</style>

<div class="tentang-container">
    <h1>Sekilas Tentang Layanan Ini</h1>
    <p>
        Website ini bertujuan untuk memudahkan pengguna dalam mencari informasi mengenai
        data desa yang memiliki kesamaan di berbagai kecamatan,
        kabupaten, dan provinsi. Kesamaan nama ini dapat menimbulkan potensi dalam pembuatan
        domain masing - masing desa. Selain itu juga ada data kecamatan, kota & kabupaten, dan 
        provinsi.
    </p>
</div>
@endsection
