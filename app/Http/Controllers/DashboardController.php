<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        // $provinsi = DB::table('data_konflik_provinsi')
        // ->select('provinsi', 'jumlah_domain_konflik')
        // ->orderByDesc('jumlah_domain_konflik')
        // ->limit(10)
        // ->get();

        $jumlahDesaIndonesia = DB::table('datadesa')->count();

        $jumlahDesaKonflik = DB::table('datadesa_konflik')->count();

        $jumlahProvTertinggi = DB::table('data_konflik_provinsi')
        ->select('provinsi')
        ->orderByDesc('jumlah_domain_konflik')
        ->first();

        $jumlahkotakabTertinggi = DB::table('data_konflik_kotakabupaten')
        ->select('kota_kabupaten')
        ->orderByDesc('jumlah_domain_konflik')
        ->first();

        $jumlahkecTertinggi = DB::table('data_konflik_kecamatan')
        ->select('kecamatan')
        ->orderByDesc('jumlah_domain_konflik')
        ->first();

        return view('dashboard', compact('jumlahDesaIndonesia', 'jumlahDesaKonflik', 'jumlahProvTertinggi', 'jumlahkotakabTertinggi', 'jumlahkecTertinggi'));
    }
}
