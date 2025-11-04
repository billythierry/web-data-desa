@extends('layouts.main')

@section('title', 'Cari Data Desa')

@section('content')
    <style>
        .search-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 10vh;
            text-align: center;
        }

        .search-box {
            width: 100%;
            max-width: 600px;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .search-box input[type="text"] {
            width: 80%;
            padding: 12px 15px;
            font-size: 18px;
            border: 2px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        .search-box input[type="text"]:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.3);
        }

        .search-box input[type="submit"] {
            padding: 12px 20px;
            margin-left: 10px;
            font-size: 16px;
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-box input[type="submit"]:hover {
            background-color: #0b5ed7;
        }

        .result-section {
            margin-top: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f8f9fa;
        }
    </style>

    <div class="search-section">
        <h1>Cari Data Desa</h1>
        <p>Masukkan nama desa untuk mencari data</p>

        <form class="search-box" action="{{ url('/caridesa') }}" method="GET">
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_desa }}</td>
                        <td>{{ $d->kecamatan }}</td>
                        <td>{{ $d->kota_kabupaten }}</td>
                        <td>{{ $d->provinsi }}</td>
                        <td>{{ $d->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $dataDesa->links() }}
        </div>
    @elseif(request()->has('cari'))
        <div class="result-section" style="text-align:center;">
            <p><strong>Tidak ada hasil untuk "{{ request('cari') }}"</strong></p>
        </div>
    @endif
@endsection
