<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LostItemController;

// LANDING PAGE
Route::view('/', 'welcome')->name('landing');

// AUTH
Route::get('/login', fn()=>view('auth.login'))->name('login');
Route::post('/login-proses', [AuthController::class, 'loginProses'])->name('login.proses');

Route::get('/register', fn()=>view('auth.register'))->name('register');
Route::post('/register-proses', [AuthController::class, 'registerProses'])->name('register.proses');

// Barang Hilang / Ditemukan per kategori
Route::get('/barang-hilang/{slug}', [LostItemController::class, 'hilangKategori'])
     ->name('kategori.hilang');

Route::get('/barang-ditemukan/{slug}', [LostItemController::class, 'ditemukanKategori'])
     ->name('kategori.ditemukan');

Route::get('/barang-hilang-ditemukan', [LostItemController::class, 'allItems'])
    ->name('lost.found.all');

Route::get('/barang-hilang-ditemukan/{kategori}', [LostItemController::class, 'allItems'])
    ->name('lost.found.category');

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::get('/profile/detailprofile', function () {
    return view('profile.detailprofile');
})->name('profile.detailprofile')->middleware('auth');

Route::get('/found/create', [LostItemController::class, 'createFound'])->name('found.create');

Route::get('/lost/create', [LostItemController::class, 'create'])->name('lost.create');

Route::get('/lost/deletepage', [LostItemController::class, 'deletePage'])
    ->name('lost.deletePage')
    ->middleware('auth');

Route::resource('lost', LostItemController::class);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// DASHBOARD
Route::middleware('auth')
    ->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// LOST & FOUND CRUD
Route::resource('lost', LostItemController::class);
