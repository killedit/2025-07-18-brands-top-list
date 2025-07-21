<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::get('/brands', [BrandController::class, 'show']);
Route::post('/brands', [BrandController::class, 'store']);
Route::put('/brands/{brand}', [BrandController::class, 'update']);
Route::delete('/brands/{brand}', [BrandController::class, 'destroy']);
