<?php

use App\Http\Controllers\Antrian;
use Illuminate\Support\Facades\Route;

/**-----------------------
 * Antrian Routes
 * Base Route: /
 *
 *------------------------**/
Route::get('/', [Antrian::class, 'index']);
Route::get('/cetak/{id}', [Antrian::class, 'show']);
