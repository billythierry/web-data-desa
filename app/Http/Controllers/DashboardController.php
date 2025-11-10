<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //return view('dashboard');
        
        $provinsi = DB::table('data_konflik_provinsi')
        ->select('provinsi', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get();

        $kabupaten = DB::table('data_konflik_kotakabupaten')
        ->select('kota_kabupaten', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get(); 

        $kecamatan = DB::table('data_konflik_kecamatan')
        ->select('kecamatan', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(15)
        ->get();

        return view('dashboard', [
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan
        ]);
    }
}
