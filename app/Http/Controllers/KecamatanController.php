<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = DB::table('data_konflik_kecamatan')
        ->select('kecamatan', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get();

        return view('kecamatan', [
            'kecamatan' => $kecamatan,
            'dataKecamatan' => null,
            'dataKecamatanForChart' => null,
            'isSearching' => false,
            'cari' => null
        ]);
    }

    public function cari()
    {
        $cari = request()->input('cari');

        //validasi
        if(!$cari)
        {
            return view('kecamatan');
        }

        $kecamatan = DB::table('data_konflik_kecamatan')
        ->select('kecamatan', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get();

        $dataKecamatan = DB::table('datadesa')
        ->whereRaw('LOWER(kecamatan) = LOWER(?)', [$cari])
        // ->orderBy('nama_desa')
        ->paginate(10)
        ->appends(['cari' => $cari]);
        // ->withQueryString();

        return view('kecamatan', [
            'kecamatan' => $kecamatan,
            'dataKecamatan' => $dataKecamatan,
            'dataKecamatanForChart' => $dataKecamatan->items(),
            'isSearching' => true,
            'cari' => $cari
        ]);
    }
}
