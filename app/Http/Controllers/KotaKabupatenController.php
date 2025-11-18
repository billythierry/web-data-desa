<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KotaKabupatenController extends Controller
{
    public function index()
    {
        $kotakabupaten = DB::table('data_konflik_kotakabupaten')
        ->select('kota_kabupaten', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get();

        return view('kotakabupaten', [
            'kotakabupaten' => $kotakabupaten,
            'dataKotaKabupaten' => null,
            'dataKotaKabupatenForChart' => null,
            'isSearching' => false,
            'cari' => null
        ]);
    }

    public function cari()
    {
        $cari = request()->input('cari');

        //validasi
        if (!$cari){
            return view('kotakabupaten');
        }

        $kotakabupaten = DB::table('data_konflik_kotakabupaten')
        ->select('kota_kabupaten', 'jumlah_domain_konflik')
        ->orderByDesc('jumlah_domain_konflik')
        ->limit(10)
        ->get();

        $dataKotaKabupaten = DB::table('data_konflik_kecamatan as kec')
        ->join('data_konflik_kotakabupaten as kk', DB::raw('LEFT(kec.kode_wil, 5)'), '=', DB::raw('LEFT(kk.kode_wil, 5)'))
        ->whereRaw("LOWER(TRIM(REPLACE(REPLACE(kk.kota_kabupaten, 'KAB.', ''), 'KOTA', ''))) = ?", [ $cari ])
        ->select('kec.kecamatan', 'kec.jumlah_domain_konflik')
        ->orderByDesc('kec.jumlah_domain_konflik')
        ->paginate(10)
        ->withQueryString();

        return view('kotakabupaten',[
            'kotakabupaten' => $kotakabupaten,
            'dataKotaKabupaten' => $dataKotaKabupaten,
            'dataKotaKabupatenForChart' => $dataKotaKabupaten->items(),
            'isSearching' => true,
            'cari' => $cari
        ]);
    }
}
