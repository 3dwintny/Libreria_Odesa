<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\AutorLibroController;
use App\Http\Controllers\CategoriaLibroController;
use App\Http\Controllers\CategoriumController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\LibreriumController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\RelacionLibreriaDepartamento;
use App\Http\Controllers\CompraLibroController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('registrar-compras',CompraController::class);
Route::resource('registrar-compras-libros',CompraLibroController::class);
Route::post('registrar-compras-libros/fecha',[CompraLibroController::class,'buscarFecha'])->name('buscarFecha');
Route::post('registrar-compras-libros/proveedor',[CompraLibroController::class,'buscarProveedor'])->name('buscarProveedor');
Route::resource('proveedores',ProveedorController::class);
Route::post('proveedores/proveedor',[ProveedorController::class,'buscarProveedores'])->name('buscarProveedores');
Route::resource('libreria', LibreriumController::class);
Route::resource('deptoLibreria', RelacionLibreriaDepartamento::class);
Route::resource('libros', LibroController::class);
Route::resource('categoria', CategoriumController::class);
Route::resource('autors', AutorController::class);
Route::resource('categoria-libros', CategoriaLibroController::class);
Route::resource('autor-libros', AutorLibroController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('municipios', MunicipioController::class);
Route::resource('editorials', EditorialController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
