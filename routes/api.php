<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\PistasController;
use App\Http\Controllers\Api\v1\SociosController;
use App\Http\Controllers\Api\v1\DeportesController;
use App\Http\Controllers\Api\v1\ReservasController;


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
Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\v1',
], function () {
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login']);
    Route::middleware('auth:api')->group(function () {
        Route::apiResource('/deportes', DeportesController::class);
        Route::apiResource('/pistas', PistasController::class);
        Route::apiResource('/socios', SociosController::class);
        Route::apiResource('/reservas', ReservasController::class);
        Route::post('/logout', [UserController::class, 'logout']);
    });
});
Route::group([
    'prefix' => 'v2',
    'namespace' => 'App\Http\Controllers\Api\v2',
], function () {
    Route::apiResource('/reservas', 'ReservasController');
});
