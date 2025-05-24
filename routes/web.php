<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CuentaController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/simulador', function () {
    return view('simulador');
});

Route::get('/dashboard', function () {
    return redirect()->route('users.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('cuentas', CuentaController::class);
    Route::resource('tarjetas', TarjetaController::class);
    Route::resource('transacciones', TransaccionController::class);
    Route::resource('prestamos', PrestamoController::class);
    Route::resource('pagos', PagoController::class);
});

require __DIR__.'/auth.php';
