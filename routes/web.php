<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JuegoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('galeria', [JuegoController::class, 'getJuegos']);

Route::get('nuevo', [JuegoController::class, 'nuevoJuego']);

Route::post('nuevo', [JuegoController::class, 'postJuego']);

Route::get('juegos/show/{id}', [JuegoController::class, 'getShow']);

Route::get('juegos/edit/{id}', [JuegoController::class, 'getEdit']);

Route::put('juegos/edit/{id}', [JuegoController::class, 'putEdit']);

Route::get('borrar/{id}', [JuegoController::class, 'borrar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
