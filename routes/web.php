<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman awal (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard default Laravel Breeze (optional)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth',])->group(function () {
    // Dashboard Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // CRUD Problem (hanya admin)
    Route::resource('/admin/problems', ProblemController::class)->except(['show']);

    // Kelola Team / Scoreboard (opsional)
    Route::get('/admin/teams', [TeamController::class, 'index'])->name('admin.teams.index');
    Route::get('/admin/scoreboard', [ScoreboardController::class, 'index'])->name('admin.scoreboard.index');
});
Route::get('/peserta/scoreboard', [ScoreboardController::class, 'index'])->name('peserta.scoreboard.index');

/*
|--------------------------------------------------------------------------
| PESERTA AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Halaman utama peserta
    Route::get('/peserta', function () {
        return view('peserta.index'); // resources/views/peserta/index.blade.php
    })->name('peserta.index');

    // Problem list & detail
    Route::get('/peserta/problems', [ProblemController::class, 'index'])->name('peserta.problems.index');
    Route::get('/peserta/problems/{problem}', [ProblemController::class, 'show'])->name('peserta.problems.show');

    // Submit flag
    Route::post('/peserta/submit', [SubmitController::class, 'store'])->name('peserta.submit.store');

    // Tim & Scoreboard
    Route::get('/peserta/teams', [TeamController::class, 'index'])->name('peserta.teams.index');
    Route::get('/peserta/scoreboard', [ScoreboardController::class, 'index'])->name('peserta.scoreboard.index');

    // Profil peserta
    Route::get('/peserta/profile', [ProfileController::class, 'edit'])->name('peserta.profile.edit');
    Route::patch('/peserta/profile', [ProfileController::class, 'update'])->name('peserta.profile.update');
    Route::delete('/peserta/profile', [ProfileController::class, 'destroy'])->name('peserta.profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
