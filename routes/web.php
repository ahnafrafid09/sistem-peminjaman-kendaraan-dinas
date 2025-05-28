<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index']);

// Landing Page
Route::get('/landing', function () {
    return view('landing');
});

// Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Dashboard Routes
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KepalaUnitController;
use Illuminate\Support\Facades\Auth; 

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

Auth::routes();

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // User Management
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    
    // Jurusan Management
    Route::resource('jurusan', JurusanController::class)->except(['show']);
    
    // Prodi Management
    Route::resource('prodi', ProdiController::class)->except(['show']);
    
    // Mobil Management
    Route::resource('mobil', MobilController::class);
    
    // Peminjaman Management
    Route::resource('peminjaman', PeminjamanController::class)->except(['create', 'store']);
    
    // Pengembalian Management
    Route::resource('pengembalian', PengembalianController::class)->except(['create', 'store']);
    
    // Rekapitulasi
    Route::get('/rekapitulasi', [AdminController::class, 'rekapitulasi'])->name('admin.rekapitulasi');
});

// Dosen Routes
Route::prefix('dosen')->middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
    Route::get('/profile', [DosenController::class, 'profile'])->name('dosen.profile');
    
    // Mobil
    Route::get('/mobil', [DosenController::class, 'listMobil'])->name('dosen.mobil.index');
    
    // Peminjaman
    Route::get('/peminjaman/create/{mobil}', [DosenController::class, 'createPeminjaman'])->name('dosen.peminjaman.create');
    Route::post('/peminjaman', [DosenController::class, 'storePeminjaman'])->name('dosen.peminjaman.store');
    Route::get('/peminjaman', [DosenController::class, 'indexPeminjaman'])->name('dosen.peminjaman.index');
    Route::get('/peminjaman/{peminjaman}', [DosenController::class, 'showPeminjaman'])->name('dosen.peminjaman.show');
    
    // Pengembalian
    Route::get('/pengembalian/create/{peminjaman}', [DosenController::class, 'createPengembalian'])->name('dosen.pengembalian.create');
    Route::post('/pengembalian', [DosenController::class, 'storePengembalian'])->name('dosen.pengembalian.store');
    Route::get('/pengembalian', [DosenController::class, 'indexPengembalian'])->name('dosen.pengembalian.index');
});

// Kepala Unit Routes
Route::prefix('kepalaunit')->middleware(['auth', 'role:kepala_unit'])->group(function () {
    Route::get('/dashboard', [KepalaUnitController::class, 'dashboard'])->name('kepalaunit.dashboard');
    Route::get('/profile', [KepalaUnitController::class, 'profile'])->name('kepalaunit.profile');
    
    // Mobil Management
    Route::resource('mobil', MobilController::class)->only(['index', 'show']);
    
    // Peminjaman Approval
    Route::get('/peminjaman', [KepalaUnitController::class, 'indexPeminjaman'])->name('kepalaunit.peminjaman.index');
    Route::get('/peminjaman/{peminjaman}', [KepalaUnitController::class, 'showPeminjaman'])->name('kepalaunit.peminjaman.show');
    Route::put('/peminjaman/{peminjaman}/approve', [KepalaUnitController::class, 'approvePeminjaman'])->name('kepalaunit.peminjaman.approve');
    
    // Pengembalian Approval
    Route::get('/pengembalian', [KepalaUnitController::class, 'indexPengembalian'])->name('kepalaunit.pengembalian.index');
    Route::get('/pengembalian/{pengembalian}', [KepalaUnitController::class, 'showPengembalian'])->name('kepalaunit.pengembalian.show');
    Route::put('/pengembalian/{pengembalian}/approve', [KepalaUnitController::class, 'approvePengembalian'])->name('kepalaunit.pengembalian.approve');
    
    // Rekapitulasi
    Route::get('/rekapitulasi', [KepalaUnitController::class, 'rekapitulasi'])->name('kepalaunit.rekapitulasi');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
