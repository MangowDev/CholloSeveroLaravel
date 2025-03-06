<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\AuthController;
use App\Models\Deals;
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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register', [UsersController::class, 'create'])->name('register.submit');

Route::get('/chollos', [DealsController::class, 'showDeals'])
    ->name('chollos');

Route::get('/misChollos', [DealsController::class, 'myDeals'])
    ->name('misChollos');

Route::get('/chollos/create', function () {
    return view('create');
})->middleware('auth')->name('chollos.create');

Route::get('/chollos/edit/{id}', function ($id) {
    $deal = Deals::findOrFail($id); 
    return view('edit', compact('deal'));
})->middleware('auth')->name('chollos.edit');


Route::post('/chollos/createDeal', [DealsController::class, 'create'])->name('chollos.createDeal');
Route::put('/chollos/editDeal/{id}', [DealsController::class, 'update'])->name('chollos.editDeal');
Route::delete('/chollos/deleteDeal/{id}', [DealsController::class, 'delete'])->name('chollos.deleteDeal');
