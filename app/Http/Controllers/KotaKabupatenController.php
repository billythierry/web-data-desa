<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KotaKabupatenController extends Controller
{
    public function index()
    {
        $kabupaten = DB::table('data_konflik_kotakabupaten')
        ->select('kota_kabupaten', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get();

        return view('kotakabupaten', [
            'kabupaten' => $kabupaten
        ]);
    }
}
