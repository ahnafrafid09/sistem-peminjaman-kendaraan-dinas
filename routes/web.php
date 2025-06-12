<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardKepalaUnitController;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot password
Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('auth.forgot');

// Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route admin
require __DIR__ . '/admin.php';
require __DIR__ . '/kepala-unit.php';
require __DIR__ . '/pegawai.php';


// Route::middleware(['auth', 'role:dosen'])->get('/dosen/dashboard', [DashboardDosenController::class, 'index'])->name('dosen.dashboard');
// Route::middleware(['auth', 'role:kepala_unit'])->get('/kepala_unit/dashboard', [DashboardKepalaUnitController::class, 'index'])->name('kepalaunit.dashboard');