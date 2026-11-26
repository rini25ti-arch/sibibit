<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\VarietasController;
use Illuminate\Support\Facades\Route;
// 2. Autentikasi (Halaman Login Tersendiri untuk Pembeli & Admin)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login-pembeli', [AuthController::class, 'loginPembeli'])->name('login.pembeli');
Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('login.admin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 1. Halaman Dashboard Utama (Publik) & Download PDF Panduan
Route::get('/', [DashboardController::class, 'landing'])->name('home');
Route::get('/download-panduan-pdf', [DashboardController::class, 'downloadPdf'])->name('download.pdf');

// 2. Autentikasi (Login Pembeli & Login Admin)
Route::post('/login-pembeli', [AuthController::class, 'loginPembeli'])->name('login.pembeli');
Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('login.admin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Halaman Admin (Menggunakan template Sneat Anda)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('varietas', VarietasController::class)->parameters(['varietas' => 'varietas']);

    // CRUD Tambah Stok & Proses Status Pesanan
    Route::post('/varietas/{id}/tambah-stok', [DashboardController::class, 'tambahStok'])->name('admin.tambahStok');
    Route::post('/pesanan/{id}/update-status', [DashboardController::class, 'updateStatus'])->name('admin.updateStatus');
});

// 4. Halaman Pembeli (Beli Bibit & Cek Status Pesanan)
Route::middleware(['auth'])->prefix('pembeli')->group(function () {
    Route::get('/dashboard', [PembeliController::class, 'index'])->name('pembeli.dashboard');
    Route::post('/beli', [PembeliController::class, 'beli'])->name('pembeli.beli');
});
