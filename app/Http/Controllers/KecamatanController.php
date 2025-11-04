<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function kecamatan()
    {
        return view('kecamatan');
    }
}
