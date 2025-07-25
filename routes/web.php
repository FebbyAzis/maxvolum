<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisTasController;
use App\Http\Controllers\JenisBahanController;
use App\Http\Controllers\PesananController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard-admin', [DashboardController::class, 'dashboard_admin'])->name('admin.dashboard');
    Route::get('/kelola-jenis-tas', [JenisTasController::class, 'jenis_tas_admin']);
    Route::post('/tambah-jenis-tas', [JenisTasController::class, 'tambah_jenis_tas']);
    Route::put('/edit-jenis-tas/{id}', [JenisTasController::class, 'edit_jenis_tas']);
    Route::get('/kelola-jenis-bahan', [JenisBahanController::class, 'jenis_bahan_admin']);
    Route::post('/tambah-jenis-bahan', [JenisBahanController::class, 'tambah_jenis_bahan']);
    Route::put('/edit-jenis-bahan/{id}', [JenisBahanController::class, 'edit_jenis_bahan']);
    Route::put('/terima-pesanan/{id}', [PesananController::class, 'terima_pesanan']);
    Route::put('/pesanan-selesai/{id}', [PesananController::class, 'pesanan_selesai']);
    Route::get('/kelola-pesanan', [PesananController::class, 'kelola_pesanan']);
    Route::get('/laporan', [DashboardController::class, 'laporan']);
    Route::get('/cetak', [DashboardController::class, 'cetak']);
    Route::get('/cetak-laporan/{tglawal}/{tglakhir}', [DashboardController::class, 'cetak_laporan']);
});

Route::middleware(['auth', 'users'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard_users'])->name('users.dashboard');
    Route::get('/jenis-tas', [JenisTasController::class, 'jenis_tas_users']);
    Route::get('/jenis-bahan', [JenisBahanController::class, 'jenis_bahan_users']);
    Route::get('/pesan-tas-custom', [PesananController::class, 'pesanan_users']);
    Route::post('/buat-pesanan-tas-custom', [PesananController::class, 'buat_pesanan']);
    Route::get('/pesanan-saya', [PesananController::class, 'pesanan_saya']);
    Route::put('/pembayaran/{id}', [PesananController::class, 'pembayaran']);
    Route::put('/tambah-alamat/{id}', [PesananController::class, 'tambah_alamat']);
});
