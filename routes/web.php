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
Route::get('/', function () {
    return view('welcome'); // Mengarah ke Landing Page
})->name('home');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/fitur', function () {
    return view('fitur');
})->name('fitur');

Route::get('/panduan', function () {
    return view('panduan');
})->name('panduan');

// ==========================================
// ROUTE AUTH (Login/Register/Logout)
// ==========================================
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
    
    // Resource untuk User (termasuk index, create, store, show, edit, update, destroy)
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
    
    // Manajemen Pengaduan (Admin hanya butuh index, show, update)
    Route::resource('pengaduan', AdminPengaduan::class)->only(['index', 'show', 'update']);
});