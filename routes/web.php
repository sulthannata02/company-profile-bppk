<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EstimasiController;
use App\Http\Controllers\ShowBlogController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Ganti bahasa
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])
    ->name('lang.switch');

// Estimasi harga
Route::get('/estimasi-harga-pariwisata', function () {
    return view('estimasi-harga-pariwisata');
})->name('estimasi-harga-pariwisata');

Route::get('/estimasi-harga-pariwisata', [EstimasiController::class, 'index'])
    ->name('estimasi-harga-pariwisata');
Route::post('/estimasi-harga-pariwisata/hitung', [EstimasiController::class, 'hitung'])
    ->name('estimasi-harga-pariwisata.hitung');

// Detail blog
Route::get('/blog/{slug}', [ShowBlogController::class, 'show'])
    ->name('blog.show');



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
