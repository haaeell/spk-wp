<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('alternatif', AlternatifController::class);
Route::resource('kriteria', KriteriaController::class);
Route::resource('penilaian', PenilaianController::class);
Route::resource('user', UserController::class);
Route::get('pasien/penilaian', [PenilaianController::class,'pasienIndex'])->name('pasien.penilaian.index');
Route::get('perhitungan', [PerhitunganController::class,'index'])->name('perhitungan.index');
Route::get('hasil-akhir', [PerhitunganController::class,'hasilAkhir'])->name('perhitungan.hasilAkhir');
Route::get('/hasil-akhir/pdf', [PerhitunganController::class, 'cetakPdf'])->name('hasil-akhir.pdf');
