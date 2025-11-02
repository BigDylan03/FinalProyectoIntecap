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



Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
