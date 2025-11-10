<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataDesaController extends Controller
{
    public function index()
    {
        return view('desa');
    }

    public function cari(Request $request)
    {
        // Input data pencarian
        $cari = $request->input('cari');

        // Nyari data di database (tabel datadesa)
        $dataDesa = DB::table('datadesa')
            ->where('nama_desa', 'Like', '%' . $cari . '%')
            ->paginate(10);
        
        return view('desa', ['dataDesa' => $dataDesa]);
    }
}
