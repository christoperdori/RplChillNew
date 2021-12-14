<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

    Route::get('buatSurat', [SuratController::class, 'index']);
    Route::post('simpanSurat', [SuratController::class, 'simpan']);
    Route::get('suratKeluar', [SuratController::class, 'suratKeluar']);
    Route::get('suratMasuk', [SuratController::class, 'suratMasuk']);
    Route::get('unduh{id}', [SuratController::class, 'unduh']);
    Route::get('arsip', [SuratController::class, 'arsip']);
    Route::get('ubah{id}', [SuratController::class, 'ubah']);
    Route::put('update{id}', [SuratController::class, 'update']);
    Route::get('hapus{id}', [SuratController::class, 'hapus']);

    Route::get('valid{id}', [AdminController::class, 'valid']);
    Route::put('validSurat{id}', [AdminController::class, 'simpanValid']);
    Route::put('kirim{id}', [AdminController::class, 'upload']);
 
    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
    });

    Route::middleware(['mahasiswa'])->group(function () {
        Route::get('mahasiswa', [MahasiswaController::class, 'index']);
    });

    Route::middleware(['dosen'])->group(function () {
        Route::get('dosen', [DosenController::class, 'index']);
    });
});