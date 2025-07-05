<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RotiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| DEFAULT ROOT - Redirect ke Login
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => redirect()->route('login'));

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Login & Register)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| LOGOUT ROUTE
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Hanya Bisa Diakses Setelah Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Roti
    Route::resource('/rotis', RotiController::class);

    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

    // Riwayat Transaksi & Nota
    Route::get('/riwayat', [TransaksiController::class, 'riwayat'])->name('transaksi.riwayat');
    Route::get('/nota/{id}', [TransaksiController::class, 'nota'])->name('transaksi.nota');
});
