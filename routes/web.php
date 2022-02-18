<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/**-----------------------
 * Antrian Routes
 * Base Route: /
 *
 *------------------------**/
Route::get('/', [AntrianController::class, 'index']);
Route::get('/cetak/{id}', [AntrianController::class, 'show']);

/**-----------------------
 * Dashboard Routes
 * Base Route: /dashboard
 *
 *------------------------**/
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/vaksin', [DashboardController::class, 'vaksin']);
