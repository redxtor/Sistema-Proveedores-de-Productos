<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegionesController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/proveedores', [ProveedorController::class, 'index'])->middleware(['verified','auth'])->name('proveedores');

// Route::controller(ProveedorController::class)->middleware(['verified','auth'])->group(function () {
//     Route::get('/proveedores', 'index'); // Retorna la Vista Catálogo de Proveedores
// });


// Route::get('/proveedores', function () {
//     return view('proveedores');
// })->middleware(['auth', 'verified'])->name('proveedores');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedor.index');
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
});

require __DIR__.'/auth.php';
