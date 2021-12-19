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

Route::get('/',function () {
    return view('welcome');
});

Route::get('perfil', function () {
    return view('perfil');
});

Route::get('modal', function () {
    return view('modal');
});

Auth::routes();
Route::resource('prueba',App\Http\Controllers\PruebaController::class);

Route::resource('comunidades',App\Http\Controllers\ComunidadeController::class);
Route::resource('tipos_comunidad',App\Http\Controllers\Tipos_comunidadeController::class);

Route::resource('carrera',App\Http\Controllers\CarreraController::class);
Route::resource('lineas_investigacion',App\Http\Controllers\Lineas_investigacioneController::class);

Route::resource('especialidad',App\Http\Controllers\EspecialidadeController::class);

Route::resource('trayecto',App\Http\Controllers\TrayectoController::class);
Route::resource('trimestre',App\Http\Controllers\TrimestreController::class);
Route::resource('turno',App\Http\Controllers\TurnoController::class);

Route::resource('producto',App\Http\Controllers\ProductoController::class);
Route::resource('items_estructura',App\Http\Controllers\Items_estructuraController::class);

Route::resource('tipos_asesoria',App\Http\Controllers\Tipos_asesoriaController::class);

Route::resource('estatus_comunidades',App\Http\Controllers\Estatus_comunidadeController::class);
Route::resource('estatus_progresos',App\Http\Controllers\Estatus_progresoController::class);
Route::resource('estatus_necesidades',App\Http\Controllers\Estatus_necesidadeController::class);
Route::resource('estatus_situaciones',App\Http\Controllers\Estatus_situacioneController::class);

Route::post('municipios', [App\Http\Controllers\ComunidadeController::class, 'municipios']);
Route::post('parroquias', [App\Http\Controllers\ComunidadeController::class, 'parroquias']);
Route::get('/showcomunid/{id}', [App\Http\Controllers\ComunidadeController::class, 'show']);
Route::post('/editcomunid', [App\Http\Controllers\ComunidadeController::class, 'edit']);
Route::post('/SaveEditcomunid', [App\Http\Controllers\ComunidadeController::class, 'Savedit']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
