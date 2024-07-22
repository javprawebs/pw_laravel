<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\LoginController;

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


Route::get('/', [ArticuloController::class, 'mainWeb'])->name('home');


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/articulos', [ArticuloController::class, 'index'])->name('admin.articulos');
    Route::get('/articulos/create', [ArticuloController::class, 'create'])->name('admin.articulos.create');
    Route::post('/articulos', [ArticuloController::class, 'store'])->name('admin.articulos.store');
    Route::get('/articulos/{id}/edit', [ArticuloController::class, 'edit'])->name('admin.articulos.edit');
    Route::put('/articulos/{id}', [ArticuloController::class, 'update'])->name('admin.articulos.update');
    Route::delete('/articulos/{id}', [ArticuloController::class, 'destroy'])->name('admin.articulos.destroy');

    Route::get('/info', [ArticuloController::class, 'infoView'])->name('admin.info');
});


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');