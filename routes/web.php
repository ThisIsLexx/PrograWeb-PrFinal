<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\OrderController;

use App\Models\Platillo;
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

Route::get('/', [PlatilloController::class, 'menu'])->name('welcome');

Route::resource('catalogo', CatalogoController::class)->middleware('auth');

Route::resource('platillo', PlatilloController::class)->middleware('auth');

Route::resource('order', OrderController::class);

Route::post('/guardarArchivo/{platillo_id}', [PlatilloController::class, 'guardarArchivo'])->name('guardar');
Route::post('/editarArchivo/{platillo_id}', [PlatilloController::class, 'editarArchivo'])->name('editar');
Route::post('/eliminarArchivo/{platillo_id}', [PlatilloController::class, 'eliminarArchivo'])->name('eliminar');

Route::get('/menu', [PlatilloController::class, 'menu'])->name('menu');
Route::get('/misPedidos', [OrderController::class, 'misPedidos'])->name('ordenes');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [PlatilloController::class, 'menu'])->name('menu');
});
