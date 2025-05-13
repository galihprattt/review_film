<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\AdminKomentarController;

// ------------------ ROUTE PUBLIK ------------------

// Halaman beranda pakai controller (bisa filter, dll)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman list film publik (filter/search)
Route::get('/films', [FilmController::class, 'list'])->name('films.index');

// Detail film
Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');

// Simpan komentar (butuh login)
Route::post('/films/{film}/komentar', [KomentarController::class, 'store'])
    ->middleware('auth')
    ->name('komentar.store');

// ------------------ ROUTE DASHBOARD & PROFIL ------------------

// Dashboard user
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Kelola profil user
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ------------------ ROUTE ADMIN ------------------

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD Film untuk Admin
    Route::get('/films', [FilmController::class, 'index'])->name('films.index');
    Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
    Route::post('/films', [FilmController::class, 'store'])->name('films.store');
    Route::get('/films/{film}/edit', [FilmController::class, 'edit'])->name('films.edit');
    Route::put('/films/{film}', [FilmController::class, 'update'])->name('films.update');
    Route::delete('/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');

    // Manajemen Komentar
    Route::get('/komentar', [AdminKomentarController::class, 'index'])->name('komentar.index');
    Route::delete('/komentar/{id}', [AdminKomentarController::class, 'destroy'])->name('komentar.destroy');
});

// ------------------ AUTH ------------------

require __DIR__.'/auth.php';
