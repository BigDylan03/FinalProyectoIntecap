<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function(){
    return view('welcome');
})->name('welcome');


//Registrar usuarios
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


//Loggear usuarios in
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//loggear usuarios out
Route::post('/', [LoginController::class, 'logout'])->name('logout');

//VER MENU, ENVIAR, ELIMINAR, ACTUALIZAR
Route::middleware('auth')->controller(LoginController::class)->group(function(){
    Route::get('/menu/menu','showMenu')->name('menu.menu');
    Route::get('/menu/receiver','showReceiverForm')->name('menu.receiver');
    Route::get('/menu/send', 'showSend')->name('menu.send');
});
    
//beneficiarios
Route::middleware('auth')->controller(ReceiverController::class)->group(function(){

    Route::get('/menu/receiver','create')->name('menu.receiver');//importa los departamentos
    Route::post('/menu/receiver','store')->name('menu.store');

});

//logica para registrar / actualizar / eliminar beneficiarios
Route::middleware('auth')->controller(ReceiverController::class)->group(function () {
    Route::get('/receivers', 'index')->name('receivers.index');
    Route::get('/receivers/create','create')->name('receivers.create');
    Route::post('/receivers', 'store')->name('receivers.store');
    Route::get('/receivers/{id}/edit','edit')->name('receivers.edit');
    Route::put('/receivers/{id}', 'update')->name('receivers.update');
    Route::delete('/receivers/{id}', 'destroy')->name('receivers.destroy');
});


Route::middleware('auth')->controller(TransactionController::class)->group(function()
{
    Route::get('/transactions', 'index')->name('transactions.index');
    Route::get('/transactions/create', 'create')->name('transactions.create');
    Route::post('/transactions','store')->name('transactions.store');
});

Route::get('/transactions/mtcn', function () {
    if (!session()->has('mtcn')) {
        return redirect()->route('transactions.index');
    }

    return view('transactions.mtcn');
})->name('transactions.mtcn');
