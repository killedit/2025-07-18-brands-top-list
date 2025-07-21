<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandUserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BrandController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/brands', [BrandController::class, 'manage'])->name('brands.manage');
    Route::get('/dashboard/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/dashboard/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/dashboard/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/dashboard/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/dashboard/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect()->route('brands.user.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
