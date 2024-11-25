<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GurumapelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// root siswa

Route::get('siswa', [SiswaController::class, 'index']);
Route::post('siswa', [SiswaController::class, 'store']);
Route::get('siswa/{id}', [SiswaController::class, 'show']);
Route::put('siswa/{id}', [SiswaController::class, 'update']);
Route::delete('siswa/{id}', [SiswaController::class, 'destroy']);

// root guru
Route::get('guru', [GuruController::class, 'index']);
Route::post('guru', [GuruController::class, 'store']);
Route::get('guru/{id}', [GuruController::class, 'show']);
Route::put('guru/{id}', [GuruController::class, 'update']);
Route::delete('guru/{id}', [GuruController::class, 'destroy']);

// root mapel
Route::get('mapel', [MapelController::class, 'index']);
Route::post('mapel', [MapelController::class, 'store']);
Route::get('mapel/{id}', [MapelController::class, 'show']);
Route::put('mapel/{id}', [MapelController::class, 'update']);
Route::delete('mapel/{id}', [MapelController::class, 'destroy']);

// root gurumapel
Route::get('gurumapel', [GurumapelController::class, 'index']);
Route::post('gurumapel', [GurumapelController::class, 'store']);
Route::get('gurumapel/{id}', [GurumapelController::class, 'show']);
Route::put('gurumapel/{id}', [GurumapelController::class, 'update']);
Route::delete('gurumapel/{id}', [GurumapelController::class, 'destroy']);
