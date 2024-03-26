<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/auth',[LoginController::class,'auth'])->name('auth.user');
Route::post('/store',[LoginController::class,'store'])->name('store.user');
Route::get('/registrar', [LoginController::class, 'registrar'])->name('registrar');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/novo', [HomeController::class, 'create'])->name('home.novo');
    Route::post('/home/store', [HomeController::class, 'store'])->name('home.store');
    Route::get('/home/{id}', [HomeController::class, 'show'])->name('home.show');
    Route::get('/home/editar/{id}', [HomeController::class, 'edit'])->name('home.editar');
    Route::put('/home/update/{id}', [HomeController::class, 'update'])->name('home.update');
    Route::get('/home/remover/{id}', [HomeController::class, 'destroy'])->name('home.remover');

    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');
    Route::get('/cliente/novo', [ClienteController::class, 'create'])->name('cliente.novo');
    Route::post('/cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');
    Route::get('/cliente/editar/{id}', [ClienteController::class, 'edit'])->name('cliente.editar');
    Route::put('/cliente/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::get('/cliente/remover/{id}', [ClienteController::class, 'destroy'])->name('cliente.remover');

    Route::get('/profissional', [ProfissionalController::class, 'index'])->name('profissional');
    Route::get('/profissional/novo', [ProfissionalController::class, 'create'])->name('profissional.novo');
    Route::post('/profissional/store', [ProfissionalController::class, 'store'])->name('profissional.store');
    Route::get('/profissional/{id}', [ProfissionalController::class, 'show'])->name('profissional.show');
    Route::get('/profissional/editar/{id}', [ProfissionalController::class, 'edit'])->name('profissional.editar');
    Route::put('/profissional/update/{id}', [ProfissionalController::class, 'update'])->name('profissional.update');
    Route::get('/profissional/remover/{id}', [ProfissionalController::class, 'destroy'])->name('profissional.remover');
});