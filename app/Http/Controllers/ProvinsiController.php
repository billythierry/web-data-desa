<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsi = DB::table('data_konflik_provinsi')
        ->select('provinsi', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get();

        return view('provinsi', [
            'provinsi' => $provinsi,
            'dataProvinsi' => null,
            'dataProvinsiForChart' => null,
            'isSearching' => false,
            'cari' => null
        ]);
    }

    public function cari(Request $request)
    {
        $cari = $request->input('cari');

        // Jika user tidak mengisi input, balikan view kosong
        if (!$cari) {
            return view('provinsi');
        }

        $provinsi = DB::table('data_konflik_provinsi')
        ->select('provinsi', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get();

        // Query untuk mencari kab/kota berdasarkan nama provinsi
        $dataProvinsi = DB::table('data_konflik_kotakabupaten as kab')
            ->join('data_konflik_provinsi as p', DB::raw('LEFT(kab.kode_wil, 2)'), '=', DB::raw('LEFT(p.kode_wil, 2)'))
            ->where('p.provinsi', 'LIKE', '%' . $cari . '%')
            ->select('kab.kota_kabupaten', 'kab.jumlah_domain_konflik')
            ->orderByDesc('kab.jumlah_domain_konflik')
            ->paginate(10)
            ->withQueryString();

        return view('provinsi', [
            'provinsi' => $provinsi,                 
            'dataProvinsi' => $dataProvinsi,         
            'dataProvinsiForChart' => $dataProvinsi->items(), 
            'isSearching' => true,
            'cari' => $cari
        ]);
    }
}