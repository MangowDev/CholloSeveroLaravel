<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rutas para vistas de login y registro
Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

// Rutas de autenticación
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Ruta para el registro de usuarios (POST)
Route::post('/register', [UsersController::class, 'create'])->name('register.submit');

// Ruta para el chollos, protegida por el middleware de autenticación
Route::get('/chollos', [DealsController::class, 'showDeals'])
    ->name('chollos');

Route::get('/misChollos', [DealsController::class, 'myDeals'])
    ->name('misChollos');

Route::get('/chollos/create', function () {
    return view('create');
})->middleware('auth')->name('chollos.create');


Route::post('/chollos/createDeal', [DealsController::class, 'create'])->name('chollos.createDeal');
Route::delete('/chollos/deleteDeal/{id}', [DealsController::class, 'delete'])->name('chollos.deleteDeal');
