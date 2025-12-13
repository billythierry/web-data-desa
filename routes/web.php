<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaKabupatenController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

//Auth
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/desa', [DataDesaController::class, 'index']);
    Route::get('/desa/caridesa', [DataDesaController::class, 'cari']);

    Route::get('/kecamatan', [KecamatanController::class, 'index']);
    Route::get('/kecamatan/carikecamatan', [KecamatanController::class, 'cari']);

    Route::get('/kotakabupaten', [KotaKabupatenController::class, 'index']);
    Route::get('/kotakabupaten/carikotakabupaten', [KotaKabupatenController::class, 'cari']);

    Route::get('/provinsi', [ProvinsiController::class, 'index']);
    Route::get('/provinsi/cariprovinsi', [ProvinsiController::class, 'cari']);

    Route::get('/tentang', function () {
        return view('tentang');
    });

});
