<?php

use App\Http\Controllers\ControladorProductos;
use App\Http\Controllers\ControladorCategorias;
use App\Http\Controllers\ControladorAlmacenes;
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

// REDIRECCIÓN DE LA URL

Route::get('/', function () {
    return redirect()->route('productos');
})->name('home');

// RUTAS PARA LOS PRODUCTOS

Route::get('/productos', [ControladorProductos::class, 'index'])->name('productos');

Route::get('/nuevoProducto', [ControladorProductos::class, 'createProductHelper'])->name('crearProducto');

Route::get('/productos/{id}', [ControladorProductos::class, 'show'])->name('mostrarProducto');

Route::post('/productos', [ControladorProductos::class, 'store'])->name('guardarProducto');

Route::post('/productos/{id}', [ControladorProductos::class, 'update'])->name('editarProducto');

Route::delete('/productos/{id}', [ControladorProductos::class, 'destroy'])->name('eliminarProducto');

// RUTAS PARA LAS CATEGORÍAS

Route::get('/categorias', [ControladorCategorias::class, 'index'])->name('categorias');

Route::get('/nuevaCategoria', function () {
    return view('contenido.categorias.crearCategoria');
})->name('crearCategoria');

Route::get('/categorias/{id}', [ControladorCategorias::class, 'show'])->name('mostrarCategoria');

Route::post('/categorias', [ControladorCategorias::class, 'store'])->name('guardarCategoria');

Route::post('/categorias/{id}', [ControladorCategorias::class, 'update'])->name('editarCategoria');

Route::delete('/categorias/{id}', [ControladorCategorias::class, 'destroy'])->name('eliminarCategoria');

// RUTAS PARA LOS ALMACENES

Route::get('/almacenes', [ControladorAlmacenes::class, 'index'])->name('almacenes');

Route::get('/nuevoAlmacen', function () {
    return view('contenido.almacenes.crearAlmacen');
})->name('crearAlmacen');

Route::get('/almacenes/{id}', [ControladorAlmacenes::class, 'show'])->name('mostrarAlmacen');

Route::post('/almacenes', [ControladorAlmacenes::class, 'store'])->name('guardarAlmacen');

Route::post('/almacenes/{id}', [ControladorAlmacenes::class, 'update'])->name('editarAlmacen');

Route::delete('/almacenes/{id}', [ControladorAlmacenes::class, 'destroy'])->name('eliminarAlmacen');
