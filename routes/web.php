<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;


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

Route::get('/', function () {
    return view('welcome Telma');
});

Route::get('/', [ServicioController::class, 'index'])->name('indexServicio');
Route::get('/maquillaje', [ServicioController::class, 'showmaquillaje'])->name('maquillaje');

Route::get('/cabello', [ServicioController::class, 'showcabello'])->name('cabello');

Route::get('/manicura', [ServicioController::class, 'showmanicura'])->name('manicura');

Route::get('/pedicura', [ServicioController::class, 'showpedicura'])->name('pedicura');

