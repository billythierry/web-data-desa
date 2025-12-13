<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KotaKabupatenController extends Controller
{
    public function index()
    {
        $kotakabupaten = DB::table('data_konflik_kotakabupaten as kk')
        ->join(
            'data_konflik_provinsi as p',
            DB::raw('LEFT(kk.kode_wil, 2)'),
            '=',
            DB::raw('LEFT(p.kode_wil, 2)')
        )
        ->select(
            'kk.kota_kabupaten',
            'kk.jumlah_domain_konflik',
            'p.provinsi'
        )
        ->orderByDesc('kk.jumlah_domain_konflik')
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

        $totalDomainKonflik = DB::table('data_konflik_kecamatan as kec')
        ->join(
            'data_konflik_kotakabupaten as kk',
            DB::raw('LEFT(kec.kode_wil, 5)'),
            '=',
            DB::raw('LEFT(kk.kode_wil, 5)')
        )
        ->whereRaw(
            "LOWER(TRIM(REPLACE(REPLACE(kk.kota_kabupaten, 'KAB.', ''), 'KOTA', ''))) LIKE ?",
            ['%' . strtolower($cari) . '%']
        )
        ->sum('kec.jumlah_domain_konflik');

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
            'totalDomainKonflik' => $totalDomainKonflik,
            'isSearching' => true,
            'cari' => $cari
        ]);
    }
}
