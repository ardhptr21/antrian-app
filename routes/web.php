<?php

use App\Http\Controllers\Antrian;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

/**-----------------------
 * Antrian Routes
 * Base Route: /
 *
 *------------------------**/
Route::get('/', [Antrian::class, 'index']);
Route::get('/cetak/{id}', [Antrian::class, 'show']);

/**-----------------------
 * Dashboard Routes
 * Base Route: /dashboard
 *
 *------------------------**/
Route::get('/dashboard', [Dashboard::class, 'index']);
