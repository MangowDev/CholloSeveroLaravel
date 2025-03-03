<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\DealsController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/users', [UsersController::class, 'get']);
Route::post('/users', [UsersController::class, 'create']);
Route::delete('/users/{id}', [UsersController::class, 'delete']);
Route::put('/users/{id}', [UsersController::class, 'update']);

// Rutas para deals
Route::get('/deals', [DealsController::class, 'get']);
Route::post('/deals', [DealsController::class, 'create']);
Route::delete('/deals/{id}', [DealsController::class, 'delete']);
Route::put('/deals/{id}', [DealsController::class, 'update']);
