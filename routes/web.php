<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaKabupatenController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/desa', [DataDesaController::class, 'index']);
Route::get('/desa/caridesa', [DataDesaController::class, 'cari']);

Route::get('/kecamatan', [KecamatanController::class, 'index']);
Route::get('/kotakabupaten', [KotaKabupatenController::class, 'index']);

Route::get('/provinsi', [ProvinsiController::class, 'index']);
Route::get('/provinsi/cariprovinsi', [ProvinsiController::class, 'cari']);

Route::get('/tentang', function () {
    return view('tentang');
});
