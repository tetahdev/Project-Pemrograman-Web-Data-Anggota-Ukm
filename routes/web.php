<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\anggotaController;
use App\Http\Controllers\divisiController;
use App\Http\Controllers\pengurusController;


// Halaman awal (optional, bisa langsung ke login/dashboard)
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// ==================== AUTH ====================
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==================== DASHBOARD ====================
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

// ==================== ANGGOTA ====================
Route::resource('anggota', anggotaController::class);

// ==================== DIVISI ====================
Route::resource('divisi', divisiController::class);

// ==================== PENGURUS ====================
Route::resource('pengurus', pengurusController::class);

Route::resource('', divisiController::class);


// ======================
// CRUD Anggota
// ======================
Route::get('/anggota_index', [anggotaController::class, 'index'])->name('anggota_index');  
Route::get('/anggota_create', [anggotaController::class, 'create'])->name('anggota_create');  
Route::post('/anggota/simpan', [anggotaController::class, 'store'])->name('anggota.store');  
Route::get('/anggota_edit', [anggotaController::class, 'edit'])->name('anggota_edit');  
Route::put('/anggota_index{id}', [anggotaController::class, 'update'])->name('anggota.update');  
Route::delete('/anggota_index{id}', [anggotaController::class, 'destroy'])->name('anggota.destroy');  

// ======================
// CRUD Divisi
// ======================
Route::get('/divisi_index', [divisiController::class, 'index'])->name('divisi_index');        // tampil semua divisi
Route::get('/divisi_create', [divisiController::class, 'create'])->name('divisi_create'); // form tambah divisi
Route::post('/divisi', [divisiController::class, 'store'])->name('divisi.store');       // simpan divisi baru
Route::get('/divisi_edit', [divisiController::class, 'edit'])->name('divisi_edit'); // form edit divisi
Route::put('/divisi_index{id}', [divisiController::class, 'update'])->name('divisi.update');  // update divisi
Route::delete('/divisi_index{id}', [divisiController::class, 'destroy'])->name('divisi.destroy'); // hapus divisi

// ======================
// CRUD Pengurus
// ======================
Route::get('/pengurus_index', [pengurusController::class, 'index'])->name('pengurus_index');        // tampil semua pengurus
Route::get('/pengurus_create', [pengurusController::class, 'create'])->name('pengurus_create'); // form tambah pengurus
Route::post('/pengurus_index', [pengurusController::class, 'store'])->name('pengurus.store');       // simpan pengurus baru
Route::get('/pengurus_edit', [pengurusController::class, 'edit'])->name('pengurus_edit'); // form edit pengurus
Route::put('/pengurus_index{id}', [pengurusController::class, 'update'])->name('pengurus.update');  // update pengurus
Route::delete('/pengurus_index{id}', [pengurusController::class, 'destroy'])->name('pengurus.destroy'); // hapus pengurus


use Illuminate\Support\Facades\Auth;

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('register'); // arahkan ke route register
})->name('logout');
