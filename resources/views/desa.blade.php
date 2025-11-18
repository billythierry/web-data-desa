@extends('layouts.main')

@section('title', 'Cari Data Desa')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/desa.css') }}">

    <div class="search-section">
        <h1>Cari Data Desa</h1>
        <p>Masukkan nama desa untuk mencari data</p>

        <form class="search-box" action="{{ url('/desa/caridesa') }}" method="GET">
            <input type="text" name="cari" placeholder="Masukkan Nama Desa..." value="{{ request('cari') }}" required>
            <input type="submit" value="CARI">
        </form>
    </div>

    @if(isset($dataDesa) && count($dataDesa) > 0)
        <div class="result-section">
            <h3>Hasil Pencarian:</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Desa</th>
                        <th>Kecamatan</th>
                        <th>Kota / Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataDesa as $d)
                    <tr>
                        <td>{{ ($dataDesa->firstItem() ?? 0) + $loop->index }}</td>
                        <td>{{ $d->nama_desa }}</td>
                        <td>{{ $d->kecamatan }}</td>
                        <td>{{ $d->kota_kabupaten }}</td>
                        <td>{{ $d->provinsi }}</td>
                        <td>{{ $d->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $dataDesa->onEachSide(1)->links('pagination.simple-custom') }}
        </div>
    @elseif(request()->has('cari'))
        <div class="result-section" style="text-align:center;">
            <p><strong>Tidak ada hasil untuk "{{ request('cari') }}"</strong></p>
        </div>
    @endif
@endsection
