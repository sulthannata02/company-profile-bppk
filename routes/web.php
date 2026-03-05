<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EstimasiController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Ganti bahasa
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])
    ->name('lang.switch');

    // Estimasi harga
Route::get(
    '/estimasi/{mobil}',
    [EstimasiController::class, 'create']
)->name('estimasi.create');

Route::post(
    '/estimasi/{mobil}',
    [EstimasiController::class, 'calculate']
)->name('estimasi.hitung');


Route::view('/login', 'login');

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin dashboard (proteksi middleware)

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('mobil', MobilController::class)->except(['create', 'edit']);
    Route::resource('blog', BlogController::class)->except(['create', 'edit']);
});
