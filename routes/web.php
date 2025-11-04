<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Registrar usuarios
Route::get('/', [StateController::class, 'index']);
Route::post('/welcome', [RegisterController::class, 'store'])->name('welcome');


//Loggear usuarios in
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//loggear usuarios out
Route::post('/', [LoginController::class, 'logout'])->name('logout');


//VER MENU, ENVIAR, ELIMINAR, ACTUALIZAR
Route::get('/menu/menu', [LoginController::class, 'showMenu'])->name('menu.menu');
Route::get('/menu/send', [LoginController::class, 'showSend'])->name('menu.send');
Route::get('/menu/update', [LoginController::class, 'showUpdate'])->name('menu.update');
Route::get('/menu/delete', [LoginController::class, 'showDelete'])->name('menu.delete');
