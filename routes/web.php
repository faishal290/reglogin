<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\PengaduanController as UserPengaduan;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduan;

// Halaman Awal
Route::get('/', function () {
    return redirect('/login');
});

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
    
    Route::resource('pengaduan', UserPengaduan::class)->only(['index', 'create', 'store', 'show']);
});

// ==========================================
// ROUTE KHUSUS ADMIN (Wajib Login & Role Admin)
// ==========================================
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('pengaduan', AdminPengaduan::class)->only(['index', 'show', 'update']);
});