<?php

use App\Http\Controllers\Pegawai\KendaraanController;
use App\Http\Controllers\Pegawai\AktivitasController;
use App\Http\Controllers\Pegawai\PengembalianController;
use App\Http\Controllers\Pegawai\DashboardController;
use App\Http\Controllers\Pegawai\PeminjamanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:pegawai'])->prefix('/pegawai')->name('pegawai.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
    Route::prefix('/peminjaman')->name('peminjaman.')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [PeminjamanController::class, 'show'])->name('show');
        Route::post('/', [PeminjamanController::class, 'store'])->name('store');
    });
    Route::prefix('/pengembalian')->name('pengembalian.')->group(function () {
        Route::get('/{id?}', [PengembalianController::class, 'index'])->name('index');
        Route::post('/{id}', [PengembalianController::class, 'store'])->name('store');
        Route::get('/detail/{id}', [PengembalianController::class, 'show'])->name('show');
    });
    Route::prefix('/aktivitas')->name('aktivitas.')->group(function () {
        Route::get('/', [AktivitasController::class, 'index'])->name('index');
        Route::get('/{id}', [AktivitasController::class, 'show'])->name('show');
    });
});