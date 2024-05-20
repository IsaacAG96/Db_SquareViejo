<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Ruta de inicio que redirige al menú principal si está autenticado, de lo contrario, redirige al login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('menu.index');
    } else {
        return redirect()->route('login');
    }
});

// Rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::get('/gestionarTablas', [MenuController::class, 'gestionarTablas']);
    Route::get('/importarTablas', [MenuController::class, 'importarTablas']);
    Route::get('/crearTablas', [MenuController::class, 'crearTablas']);
    Route::get('/importar/{nombre}', [MenuController::class, 'importarPlantilla'])->name('menu.importarPlantilla');
    Route::get('/editar/{nombre}', [MenuController::class, 'editarTabla'])->name('menu.editarTabla');
    Route::get('/eliminar/{nombre}', [MenuController::class, 'eliminarTabla'])->name('menu.eliminarTabla');
});

// Rutas de autenticación generadas por Laravel
Auth::routes();

// Ruta que redirige a home después de iniciar sesión
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Ruta del menú
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');