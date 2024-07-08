<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;



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

/*Route::get('/', function () {
    return view('welcome Telma');
});*/

Route::get('/', [ServicioController::class, 'inicio'])->name('indexServicio');
Route::get('/maquillaje', [ServicioController::class, 'showmaquillaje'])->name('maquillaje');

Route::get('/cabello', [ServicioController::class, 'showcabello'])->name('cabello');

Route::get('/manicura', [ServicioController::class, 'showmanicura'])->name('manicura');

Route::get('/pedicura', [ServicioController::class, 'showpedicura'])->name('pedicura');


//Route::get('/register', [RegisterController::class, 'create'])->name('register.index');

//Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])->name('login.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // Rutas de CRUD completas para admin
    Route::middleware(['auth.admin'])->group(function () {
        Route::resource('servicios', ServicioController::class)->except(['index', 'show'])->names([
            'create'  => 'servicios.create',
            'store'   => 'servicios.store',
            'edit'    => 'servicios.edit',
            'update'  => 'servicios.update',
            'destroy' => 'servicios.destroy'
        ]);
       
    });

    // Rutas accesibles para todos los usuarios autenticados
    Route::resource('servicios', ServicioController::class)->only(['index', 'show'])->names([
        'index'   => 'servicios.index',
        'show'    => 'servicios.show',
    ]);




//Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');
