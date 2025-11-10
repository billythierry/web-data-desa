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
            'provinsi' => $provinsi
        ]);
    }

    public function cari(Request $request)
    {
        // Input data pencarian
        $cari = $request->input('cari');

        // Nyari data di database (tabel data_konflik_provinsi)
        $dataProvinsi = DB::table('data_konflik_provinsi')
            ->where('provinsi', 'Like', '%' . $cari . '%')
            ->paginate(10);
        
        return view('provinsi', ['dataProvinsi' => $dataProvinsi]);
    }
}
