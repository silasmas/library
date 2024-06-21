<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [AbonnementController::class, 'index'])->name('home');
Route::get('/dashboard', [AbonnementController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/gbooks', [LivreController::class, 'index'])->name('gbooks');

    Route::get('/addRead/{id}', [ReservationController::class, 'update'])->name('addRead');
    Route::get('/addFavorie/{id}', [LivreController::class, 'show'])->name('addFavorie');
    Route::get('/detail/{id}', [LivreController::class, 'show'])->name('detail');

    Route::post('/search', [LivreController::class, 'search'])->name('search');
});

require __DIR__ . '/auth.php';
