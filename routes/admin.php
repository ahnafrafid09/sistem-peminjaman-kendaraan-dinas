<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\MerkMobilController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth', 'role:super_admin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/tambah-user', [UserController::class, 'create'])->name('create-user');
    Route::post('/tambah-user', [UserController::class, 'store'])->name('store-user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::put('/edit-user/{id}', [UserController::class, 'update'])->name('update-user');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::resource('jurusan', JurusanController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('kendaraan', KendaraanController::class);
    Route::prefix('/kendaraan')->name('kendaraan.')->group(function () {
        Route::resource('merk-mobil', MerkMobilController::class);
    });
});