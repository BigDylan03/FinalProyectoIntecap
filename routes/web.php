<?php

use App\Http\Controllers\StateController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StateController::class, 'index']);
Route::post('/', [RegisterController::class, 'store'])->name('welcome.store');

Route::get('/login', function(){
    return view('login');
})->name('login');