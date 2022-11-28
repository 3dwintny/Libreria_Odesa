<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\LibreriumController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\AutorLibroController;
use App\Http\Controllers\CategoriumController;
use App\Http\Controllers\CompraLibroController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\CategoriaLibroController;
use App\Http\Controllers\RelacionLibreriaDepartamento;
use App\Http\Controllers\InventarioLibreriumController;
use App\Http\Controllers\InventarioEnConsignacionController;

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
    return view('home');
});

    Auth::routes();

    Route::resource('libros',LibroController::class);
    Route::resource('inventario', InventarioLibreriumController::class);
    Route::resource('registrar-compras-libros',CompraLibroController::class);
    Route::resource('proveedores',ProveedorController::class);
    Route::resource('libreria', LibreriumController::class);
    Route::resource('deptoLibreria', RelacionLibreriaDepartamento::class);
    Route::resource('categoria', CategoriumController::class);
    Route::resource('autors', AutorController::class);
    Route::resource('categoria-libros', CategoriaLibroController::class);
    Route::resource('autor-libros', AutorLibroController::class);
    Route::resource('departamentos', DepartamentoController::class);
    Route::resource('municipios', MunicipioController::class);
    Route::resource('editorials', EditorialController::class);
    Route::resource('consignacion',InventarioEnConsignacionController::class);
    Route::resource('venta', VentaController::class);

    Route::group(['middleware' => 'auth'], function () {

	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('user', 'App\Http\Controllers\UserProfileController', ['except' => ['show']]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');

    Route::resource('inventario', InventarioLibreriumController::class);
    Route::resource('registrar-compras-libros',CompraLibroController::class);
    Route::resource('libreria', LibreriumController::class);
    Route::resource('deptoLibreria', RelacionLibreriaDepartamento::class);
    Route::resource('categoria', CategoriumController::class);
    Route::resource('autors', AutorController::class);
    Route::resource('categoria-libros', CategoriaLibroController::class);
    Route::resource('autor-libros', AutorLibroController::class);
    Route::resource('departamentos', DepartamentoController::class);
    Route::resource('municipios', MunicipioController::class);
    Route::resource('editorials', EditorialController::class);
    Route::resource('consignacion',InventarioEnConsignacionController::class);
    Route::resource('libros',LibroController::class);
    Route::resource('venta', VentaController::class);
});




	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
