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
        ->limit(15)
        ->get();

        return view('kecamatan', [
            'kecamatan' => $kecamatan
        ]);
    }
}
