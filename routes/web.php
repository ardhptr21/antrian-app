<?php

use App\Http\Controllers\QueueController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HamletController;
use App\Http\Controllers\NeighbourhoodController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

/**-----------------------
 * Antrian Routes
 * Base Route: /
 *
 *------------------------**/
Route::controller(QueueController::class)->middleware('guest')->group(function () {
    Route::get('/', 'index')->name('antrian:index');
    Route::get('/cetak/{queue}', 'show')->name('antrian:cetak');
});
Route::controller(QueueController::class)->middleware('guest')->prefix('queue')->group(function () {
    Route::post('/', 'store')->name('queue:store');
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

/**----------------------------------------------
 * Village Routes
 * Base Route: /village
 *
 *---------------------------------------------**/
Route::controller(VillageController::class)->prefix('village')->middleware('auth')->group(function () {
    Route::post('/', 'store')->name('village:store');
    Route::delete('/{village}', 'remove')->name('village:remove');
});

/**----------------------------------------------
 * Vaccine Routes
 * Base Route: /vaccine
 *
 *---------------------------------------------**/
Route::controller(VaccineController::class)->prefix('vaccine')->middleware('auth')->group(function () {
    Route::post('/', 'store')->name('vaccine:store');
    Route::delete('/{vaccine}', 'remove')->name('vaccine:remove');
    Route::put('/{vaccine}', 'update')->name('vaccine:update');
});

/**----------------------------------------------
 * Neighbourhood Routes
 * Base Route: /neighbourhood
 *
 *---------------------------------------------**/
Route::controller(NeighbourhoodController::class)->prefix('neighbourhood')->middleware('auth')->group(function () {
    Route::post('/', 'store')->name('neighbourhood:store');
    Route::delete('/{neighbourhood}', 'remove')->name('neighbourhood:remove');
});

/**------------------------------------------------------------------------
 * Hamlet Routes
 * Base Route: /hamlet
 *
 *------------------------------------------------------------------------**/
Route::controller(HamletController::class)->prefix('hamlet')->middleware('auth')->group(function () {
    Route::post('/', 'store')->name('hamlet:store');
    Route::delete('/{hamlet}', 'remove')->name('hamlet:remove');
});
