<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/**-----------------------
 * Antrian Routes
 * Base Route: /
 *
 *------------------------**/
Route::controller(AntrianController::class)->group(function () {
    Route::get('/', 'index')->name('antrian:index');
    Route::get('/cetak/{id}', 'show')->name('antrian:cetak');
});

/**-----------------------
 * Dashboard Routes
 * Base Route: /dashboard
 *
 *------------------------**/
Route::controller(DashboardController::class)->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('dashboard:index');
    Route::get('/vaksin', 'vaksin')->name('dashboard:vaksin');
    Route::get('/domisili', 'domisili')->name('dashboard:domisili');
});

/**----------------------------------------------
 *  Auth Routes
 *  Base Route: /auth
 *
 *---------------------------------------------**/
Route::controller(AuthController::class)->prefix('auth')->middleware('guest')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'attempt')->name('auth:attempt');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
