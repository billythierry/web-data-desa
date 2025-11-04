<?php

use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaKabupatenController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DataDesaController::class, 'index']);
Route::get('/caridesa', [DataDesaController::class, 'cari']);

Route::get('/kecamatan', [KecamatanController::class, 'kecamatan']);
Route::get('/kotakabupaten', [KotaKabupatenController::class, 'kotakabupaten']);
Route::get('/provinsi', [ProvinsiController::class, 'provinsi']);
