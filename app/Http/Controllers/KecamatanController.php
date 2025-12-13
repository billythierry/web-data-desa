<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function index()
    {
        // Grafik Top 10 Kecamatan
        $kecamatan = DB::table('data_potensi_konflik')
            ->select(
                'kecamatan',
                'kota_kabupaten',
                'provinsi',
                'jumlah_domain_konflik'
            )
            ->orderByDesc('jumlah_domain_konflik')
            ->limit(10)
            ->get();

        return view('kecamatan', [
            'kecamatan' => $kecamatan,
            'dataKecamatan' => null,
            'isSearching' => false,
            'cari' => null
        ]);
    }

    public function cari(Request $request)
    {
        $cari = trim($request->input('cari'));

        if (!$cari) {
            return redirect()->route('kecamatan.index');
        }

        // Grafik tetap konsisten (Top 10)
        $kecamatan = DB::table('data_potensi_konflik')
            ->select(
                'kecamatan',
                'kota_kabupaten',
                'provinsi',
                'jumlah_domain_konflik'
            )
            ->orderByDesc('jumlah_domain_konflik')
            ->limit(10)
            ->get();

        // Tabel hasil pencarian → detail desa
        $dataKecamatan = DB::table('datadesa')
            ->whereRaw('LOWER(kecamatan) = LOWER(?)', [$cari])
            ->orderBy('nama_desa')
            ->paginate(10)
            ->appends(['cari' => $cari]);

        return view('kecamatan', [
            'kecamatan' => $kecamatan,
            'dataKecamatan' => $dataKecamatan,
            'isSearching' => true,
            'cari' => $cari
        ]);
    }
}
