<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Admin\AdminUserController;

// ================== LANDING ==================
Route::view('/', 'welcome')->name('landing');

// ================== AUTH ==================
Route::get('/login', fn()=>view('auth.login'))->name('login');
Route::post('/login-proses', [AuthController::class, 'loginProses'])->name('login.proses');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot.password');

Route::get('/register', fn()=>view('auth.register'))->name('register');
Route::post('/register-proses', [AuthController::class, 'registerProses'])->name('register.proses');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ================== DASHBOARD ==================
Route::middleware('auth')
    ->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::middleware('auth')->get('/profile', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.profile');
    }
    return view('profile');
})->name('profile');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');

    Route::get('/users', [AdminUserController::class, 'index'])
        ->name('admin.users');

    Route::post('/users/{user}/toggle',
        [AdminUserController::class, 'toggle']
    )->name('admin.users.toggle');

    Route::get('/items', function () {
        $lostItems = \App\Models\LostItem::where('type', 'lost')->get();
        $foundItems = \App\Models\LostItem::where('type', 'found')->get();

        return view('admin.items', compact('lostItems', 'foundItems'));
    })->name('admin.items');

    Route::delete('/items/{id}',
        [\App\Http\Controllers\LostItemController::class, 'destroy']
    )->name('admin.items.destroy');

    Route::post('/users/{user}/reset-password',
        [AdminUserController::class, 'resetPassword']
    )->name('admin.users.reset');
});


// ================== BARANG (PUBLIC) ==================
Route::get('/barang-hilang/{slug}', [LostItemController::class, 'hilangKategori'])
    ->name('kategori.hilang');

Route::get('/barang-ditemukan/{slug}', [LostItemController::class, 'ditemukanKategori'])
    ->name('kategori.ditemukan');

Route::get('/barang-hilang-ditemukan', [LostItemController::class, 'allItems'])
    ->name('lost.found.all');

Route::get('/barang-hilang-ditemukan/{kategori}', [LostItemController::class, 'allItems'])
    ->name('lost.found.category');

// ================== AUTH REQUIRED ==================
Route::middleware('auth')->group(function () {

    // PROFILE
    Route::get('/profile/detailprofile', fn() => view('profile.detailprofile'))
        ->name('profile.detailprofile');

    // CREATE BARANG
    Route::get('/found/create', [LostItemController::class, 'createFound'])
        ->name('found.create');

    Route::get('/lost/create', [LostItemController::class, 'create'])
        ->name('lost.create');

    // DELETE PAGE
    Route::get('/lost/deletepage', [LostItemController::class, 'deletePage'])
        ->name('lost.deletePage');

    // ================== VERIFICATION ==================
    Route::post('/verification/{item}', [VerificationController::class, 'store'])
    ->name('verification.store');

    Route::get('/verification/{item}', [VerificationController::class, 'create'])
    ->name('verification.create');

    // ================== CRITERIA (ADMIN / OWNER) ==================
    Route::get('/criteria', [CriteriaController::class, 'index'])
        ->name('criteria.index');

    Route::get('/criteria/{verification}',
        [CriteriaController::class, 'show']
    )->name('criteria.show')->middleware('auth');

    Route::post('/verification/{verification}/approve',
        [CriteriaController::class, 'approve']
    )->name('verification.approve')->middleware('auth');

    Route::post('/verification/{verification}/reject',
        [CriteriaController::class, 'reject']
    )->name('verification.reject')->middleware('auth');

    // ================== CRUD (sementara) ==================
    Route::resource('lost', LostItemController::class);
});

Route::get('/test-admin', function () {
    return 'ADMIN OK';
})->middleware(AdminMiddleware::class);
