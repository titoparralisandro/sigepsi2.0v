<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserControllers;
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
    return view('inicio');
});

Route::get('/about',function () {
    return view('about');
});

Route::get('/courses',function () {
    return view('courses');
});

Route::get('/catalogo', [App\Http\Controllers\ProyectoController::class, 'catalogo']);
Route::resource('/contact', App\Http\Controllers\ContactController::class);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Auth::routes();

//prueba de enviar correo
Route::get('/send-email', [MailController::class, 'sendEmail']);
//prueba de enviar correo

Route::resource('proyecto',App\Http\Controllers\ProyectoController::class);

Route::resource('comunidades',App\Http\Controllers\ComunidadeController::class);
Route::resource('tipos_comunidad',App\Http\Controllers\Tipos_comunidadeController::class);

Route::resource('necesidad',App\Http\Controllers\NecesidadeController::class);
Route::resource('situacion',App\Http\Controllers\SituacioneController::class);

Route::resource('carrera',App\Http\Controllers\CarreraController::class);
Route::resource('especialidad',App\Http\Controllers\EspecialidadeController::class);
Route::resource('lineas_investigacion',App\Http\Controllers\Lineas_investigacioneController::class);

Route::resource('trayecto',App\Http\Controllers\TrayectoController::class);
Route::resource('trimestre',App\Http\Controllers\TrimestreController::class);
Route::resource('turno',App\Http\Controllers\TurnoController::class);

Route::resource('producto',App\Http\Controllers\ProductoController::class);
Route::resource('items_estructura',App\Http\Controllers\Items_estructuraController::class);
Route::resource('estructura',App\Http\Controllers\EstructuraController::class);

Route::resource('asesor',App\Http\Controllers\ProfesoreController::class);
Route::resource('tipos_asesoria',App\Http\Controllers\Tipos_asesoriaController::class);

//Route::resource('estatus_comunidades',App\Http\Controllers\Estatus_comunidadeController::class);
//Route::resource('estatus_progresos',App\Http\Controllers\Estatus_progresoController::class);
//Route::resource('estatus_necesidades',App\Http\Controllers\Estatus_necesidadeController::class);
//Route::resource('estatus_situaciones',App\Http\Controllers\Estatus_situacioneController::class);

Route::post('/getmunicipios', [App\Http\Controllers\ComunidadeController::class, 'municipios']);
Route::post('/getparroquias', [App\Http\Controllers\ComunidadeController::class, 'parroquias']);
Route::post('/getcomunidad', [App\Http\Controllers\ComunidadeController::class, 'getcomunidad']);

Route::post('/getalumnos', [App\Http\Controllers\ProyectoController::class, 'getalumnos']);
Route::post('/getProducto', [App\Http\Controllers\ProyectoController::class, 'getProducto']);
Route::get('/evaluar/{id}', [App\Http\Controllers\ProyectoController::class, 'evaluar']);
Route::post('/getProdestruc', [App\Http\Controllers\ProyectoController::class, 'getProdestruc']);
Route::post('/SaveEvaluar', [App\Http\Controllers\ProyectoController::class, 'SaveEvaluar']);

Route::get('/showcomunid/{id}', [App\Http\Controllers\ComunidadeController::class, 'show']);
Route::post('/editcomunid', [App\Http\Controllers\ComunidadeController::class, 'edit']);
Route::post('/SaveEditcomunid', [App\Http\Controllers\ComunidadeController::class, 'Savedit']);

// Usuarios
Route::get('usuarios', [UserControllers::class,'index'])->name('usuarios.index');
Route::get('usuarios/create', [UserControllers::class,'create'])->name('usuarios.create');
Route::post('usuarios', [UserControllers::class,'store'])->name('usuarios.store');
Route::get('usuarios/{user}', [UserControllers::class,'show'])->name('usuarios.show');
Route::get('usuarios/{user}/edit', [UserControllers::class,'edit'])->name('usuarios.edit');
Route::put('usuarios/{user}', [UserControllers::class,'update'])->name('usuarios.update');
Route::delete('usuarios/{user}', [UserControllers::class,'destroy'])->name('usuarios.destroy');

Route::get('/getdataEstruc/{Typedata}', [App\Http\Controllers\EstructuraController::class, 'getdata']);
Route::post('/getdataInvest', [App\Http\Controllers\EstructuraController::class, 'getdataInvest']);
Route::post('/getdataEspe', [App\Http\Controllers\EstructuraController::class, 'getdataEspe']);

Route::get('/getdataItem', [App\Http\Controllers\EstructuraController::class, 'getdataItem']);
Route::post('/SaveEstruc', [App\Http\Controllers\EstructuraController::class, 'store']);
Route::post('/EditEstruc', [App\Http\Controllers\EstructuraController::class, 'saveEdit']);
Route::post('/DeshEstruc', [App\Http\Controllers\EstructuraController::class, 'DeshEstruc']);

Route::get('perfil', function () { return view('perfil'); });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('a_cerca_de', function () { return view('a_cerca_de'); });

Route::resource('comentario',ComentarioController::class);
