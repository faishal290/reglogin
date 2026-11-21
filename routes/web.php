<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\PengaduanController as UserPengaduan;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduan;

// ==========================================
// ROUTE HALAMAN DEPAN & STATIS (Bisa diakses tanpa login)
// ==========================================

// Halaman Beranda (Welcome)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman Tentang
Route::get('/tentang', function () {
    return view('tentang'); // Pastikan kamu punya file resources/views/tentang.blade.php
})->name('tentang');

// Halaman Fitur Layanan
Route::get('/fitur', function () {
    return view('fitur'); // Pastikan kamu punya file resources/views/fitur.blade.php
})->name('fitur');

// Halaman Panduan
Route::get('/panduan', function () {
    return view('panduan'); // Pastikan kamu punya file resources/views/panduan.blade.php
})->name('panduan');


// Route Auth (Login/Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// ROUTE KHUSUS USER (Wajib Login & Role User)
// ==========================================
Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    
    // Resource untuk User
    Route::resource('pengaduan', UserPengaduan::class);
});

// ==========================================
// ROUTE KHUSUS ADMIN (Wajib Login & Role Admin)
// ==========================================
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Manajemen Siswa
    Route::get('/siswa', [AdminDashboardController::class, 'daftarSiswa'])->name('siswa.index');
    Route::delete('/siswa/{id}', [AdminDashboardController::class, 'destroySiswa'])->name('siswa.destroy');
    
    // Manajemen Pengaduan
    Route::resource('pengaduan', AdminPengaduan::class)->only(['index', 'show', 'update']);
});