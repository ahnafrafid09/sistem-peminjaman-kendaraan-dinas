<?php

use App\Http\Controllers\KepalaUnit\AktivitasController;
use App\Http\Controllers\KepalaUnit\DashboardController;
use App\Http\Controllers\KepalaUnit\PeminjamanController;
use App\Http\Controllers\KepalaUnit\PengembalianController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth', 'role:kepala_unit'])->prefix('/kepala-unit')->name('kepala-unit.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::prefix('/peminjaman')->name('peminjaman.')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('index');
        Route::get('/approval/{id}', [PeminjamanController::class, 'approval'])->name('approval');
        Route::post('/approval/{id}', [PeminjamanController::class, 'approve'])->name('approval.submit');
    });
    Route::prefix('/pengembalian')->name('pengembalian.')->group(function () {
        Route::get('/', [PengembalianController::class, 'index'])->name('index');
        Route::get('/approval/{id}', [PengembalianController::class, 'approval'])->name('approval');
        Route::post('/approval/{id}', [PengembalianController::class, 'approve'])->name('approval.submit');
    });
    Route::prefix('/aktivitas')->name('aktivitas.')->group(function () {
        Route::get('/', [AktivitasController::class, 'index'])->name('index');
        Route::get('/{id}', [AktivitasController::class, 'show'])->name('show');
    });
});