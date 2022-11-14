<?php

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
use App\Models\Departamento;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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


