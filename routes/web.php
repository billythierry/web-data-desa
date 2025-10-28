<?php

use App\Http\Controllers\DataDesaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cariDesa', [DataDesaController::class, 'cari']);
