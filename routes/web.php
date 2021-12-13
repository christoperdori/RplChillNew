<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

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
Route::get('/dashadmin', function () {
    return view('dashadmin');
});
Route::get('/dashmhs', function () {
    return view('dashmhs');
});
Route::get('/dashdosen', function () {
    return view('dashdosen');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', function () { return view('dashadmin'); })->middleware('checkRole:admin');
Route::get('/profileadm', [App\Http\Controllers\AdminController::class, 'profileadm']);
Route::get('/buatsrtadmin', [App\Http\Controllers\AdminController::class, 'buatsrtadmin']);
Route::get('/ksdosen', [App\Http\Controllers\AdminController::class, 'ksdosen']);
Route::get('/ksmhs', [App\Http\Controllers\AdminController::class, 'ksmhs']);
Route::get('/arsipadmin', [App\Http\Controllers\AdminController::class, 'arsipadmin']);

Route::get('dosen', function () { return view('dashdosen'); })->middleware(['checkRole:dosen']);
Route::get('/profiledosen', [App\Http\Controllers\DosenController::class, 'profiledosen']);
Route::get('/buatsrtdosen', [App\Http\Controllers\DosenController::class, 'buatsrtdosen']);
Route::get('/skdosen', [App\Http\Controllers\DosenController::class, 'skdosen']);
Route::get('/smdosen', [App\Http\Controllers\DosenController::class, 'smdosen']);
Route::get('/arsipdosen', [App\Http\Controllers\DosenController::class, 'arsipdosen']);

Route::get('mahasiswa', function () { return view('dashmhs'); })->middleware(['checkRole:mahasiswa']);
Route::get('/profilemhs', [App\Http\Controllers\MahasiswaController::class, 'profilemhs']);
Route::get('/buatsrtmhs', [App\Http\Controllers\MahasiswaController::class, 'buatsrtmhs']);
Route::get('/skmhs', [App\Http\Controllers\MahasiswaController::class, 'skmhs']);
Route::get('/smmhs', [App\Http\Controllers\MahasiswaController::class, 'smmhs']);
Route::get('/arsipmhs', [App\Http\Controllers\MahasiswaController::class, 'arsipmhs']);


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/buatsrtadmin', [App\Http\Controllers\AdminController::class, 'tambah'])->name('buatsrtadmin');
Route::post('/admin/buatsrtadmin', [App\Http\Controllers\AdminController::class, 'buatsrtadmin'])->name('buatsrtadmin');
Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('editadmin');
Route::put('/admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('buatsrtadmin');
Route::get('/admin/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapus']);

Route::get('/dosen', [App\Http\Controllers\DosenController::class, 'index'])->name('dosen');
Route::get('/dosen/buatsrtdosen', [App\Http\Controllers\DosenController::class, 'tambah'])->name('buatsrtdosen');
Route::post('/dosen/buatsrtdosen', [App\Http\Controllers\DosenController::class, 'buatsrtdosen'])->name('buatsrtdosen');
Route::get('/dosen/edit/{id}', [App\Http\Controllers\DosenController::class, 'edit'])->name('editdosen');
Route::put('/dosen/update/{id}', [App\Http\Controllers\DosenController::class, 'update'])->name('buatsrtdosen');
Route::get('/dosen/hapus/{id}', [App\Http\Controllers\DosenController::class, 'hapus']);

Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa');
Route::get('/mahasiswa/buatsrtmhs', [App\Http\Controllers\MahasiswaController::class, 'tambah'])->name('buatsrtmhs');
Route::post('/mahasiswa/buatsrtmhs', [App\Http\Controllers\MahasiswaController::class, 'buatsrtmhs'])->name('buatsrtmhs');
Route::get('/mahasiswa/edit/{id}', [App\Http\Controllers\MahasiswaController::class, 'edit'])->name('editmhs');
Route::put('/mahasiswa/update/{id}', [App\Http\Controllers\MahasiswaController::class, 'update'])->name('buatsrtmhs');
Route::get('/mahasiswa/hapus/{id}', [App\Http\Controllers\MahasiswaController::class, 'hapus']);