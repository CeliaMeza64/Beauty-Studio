<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TrendController;
use App\Http\Controllers\ServicioImageController;
use App\Http\Controllers\HomeController;



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

Route::get('/', [ServicioController::class, 'inicio'])->name('indexServicio');
Route::get('/login', [SessionsController::class, 'create'])->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->name('login.destroy');

Auth::routes();

// Ruta para crear una reserva accesible sin autenticación
Route::post('reservas', [ReservaController::class, 'store'])->name('reservas.store');

// Rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::get('reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
    Route::post('reservas/{reserva}/confirm', [ReservaController::class, 'confirm'])->name('reservas.confirm');
    Route::post('reservas/{reserva}/cancel', [ReservaController::class, 'cancel'])->name('reservas.cancel');
});

// Ruta para visualizar el formulario de creación de reservas sin autenticación
Route::get('reservas/create', [ReservaController::class, 'create'])->name('reservas.create');

Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas de CRUD completas para admin
    Route::middleware(['auth.admin'])->group(function () {
        Route::resource('admin', ServicioController::class)->names([
            'create'  => 'servicios.create',
            'store'   => 'servicios.store',
            'edit'    => 'servicios.edit',
            'update'  => 'servicios.update',
            'destroy' => 'servicios.destroy',
            'index'   => 'servicios.index',
            'show'    => 'servicios.show',
            
        ]);
    
    });

    Route::get('/servicios/categoria/{categoraN}', [ServicioController::class, 'showServicios'])->name('servicios.showServicios');

//Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');

//Rota del calendario.

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');

// ruta tendencias.

    Route::resource('trends', TrendController::class);
    Route::get('trends/create', [TrendController::class, 'create'])->name('trends.create');
    Route::post('trends', [TrendController::class, 'store'])->name('trends.store');
    Route::get('trends/{trend}/edit', [TrendController::class, 'edit'])->name('trends.edit');
    Route::put('trends/{trend}', [TrendController::class, 'update'])->name('trends.update');
    Route::delete('trends/{trend}', [TrendController::class, 'destroy'])->name('trends.destroy');
    Route::get('/trends/show', [TrendController::class, 'show'])->name('trends.show');


