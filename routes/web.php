<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', [StateController::class, 'index']);
Route::post('/', [RegisterController::class, 'store'])->name('welcome.store');



Route::get('/login', [LoginController::class, 'index'])->name('login.post');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/menu', [LoginController::class, 'logados'])->name('menu');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
