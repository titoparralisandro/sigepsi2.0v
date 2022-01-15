<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Siace;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\MailController;
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
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::get('/',function () {
    return view('inicio');
});
Route::get('/send-email', [MailController::class, 'sendEmail']);

Route::get('/contact',function () {
    return view('contact');
});

Route::get('/about',function () {
    return view('about');
});

Route::get('/courses',function () {
    return view('courses');
});

Route::get('perfil', function () {
    return view('perfil');
});

Route::get('a_cerca_de', function () {
    return view('a_cerca_de');
});

Route::get('/catalogo', [App\Http\Controllers\ProyectoController::class, 'catalogo']);
Route::resource('/contact', App\Http\Controllers\ContactController::class);

Auth::routes();

Route::resource('prueba',App\Http\Controllers\PruebaController::class);

Route::resource('prueba',App\Http\Controllers\PruebaController::class);

Route::resource('comentario',ComentarioController::class);

/*
Route::get('comentario',[ComentarioController::class,'index'])->name('comentario.index');
Route::get('comentario/create',[ComentarioController::class,'create'])->name('comentario.create');
Route::get('comentario/{comentario}',[ComentarioController::class,'show'])->name('comentario.show');
Route::get('comentario/store',[ComentarioController::class,'store'])->name('comentario.store');
*/
//Route::resource('comentario',ComentarioController::class);
//Con use (index)
//Route::get('comentario',[ComentarioController::class,'index']);

// Sin use se usa App\Http\Controllers\
//Route::get('comentario',[App\Http\Controllers\ComentarioController::class,'index']);


Route::resource('asesor',App\Http\Controllers\ProfesoreController::class);
Route::resource('proyecto',App\Http\Controllers\ProyectoController::class);


Route::resource('comunidades',App\Http\Controllers\ComunidadeController::class);
Route::resource('tipos_comunidad',App\Http\Controllers\Tipos_comunidadeController::class);

Route::resource('carrera',App\Http\Controllers\CarreraController::class);
Route::resource('especialidad',App\Http\Controllers\EspecialidadeController::class);
Route::resource('lineas_investigacion',App\Http\Controllers\Lineas_investigacioneController::class);

Route::resource('trayecto',App\Http\Controllers\TrayectoController::class);
Route::resource('trimestre',App\Http\Controllers\TrimestreController::class);
Route::resource('turno',App\Http\Controllers\TurnoController::class);

Route::resource('producto',App\Http\Controllers\ProductoController::class);
Route::resource('items_estructura',App\Http\Controllers\Items_estructuraController::class);
Route::resource('estructura',App\Http\Controllers\EstructuraController::class);

Route::resource('tipos_asesoria',App\Http\Controllers\Tipos_asesoriaController::class);

Route::resource('estatus_comunidades',App\Http\Controllers\Estatus_comunidadeController::class);
Route::resource('estatus_progresos',App\Http\Controllers\Estatus_progresoController::class);
Route::resource('estatus_necesidades',App\Http\Controllers\Estatus_necesidadeController::class);
Route::resource('estatus_situaciones',App\Http\Controllers\Estatus_situacioneController::class);

Route::post('municipios', [App\Http\Controllers\ComunidadeController::class, 'municipios']);
Route::post('parroquias', [App\Http\Controllers\ComunidadeController::class, 'parroquias']);
Route::post('municipios', [App\Http\Controllers\ProyectoController::class, 'municipios']);
Route::post('parroquias', [App\Http\Controllers\ProyectoController::class, 'parroquias']);

Route::get('/showcomunid/{id}', [App\Http\Controllers\ComunidadeController::class, 'show']);
Route::post('/editcomunid', [App\Http\Controllers\ComunidadeController::class, 'edit']);
Route::post('/SaveEditcomunid', [App\Http\Controllers\ComunidadeController::class, 'Savedit']);
Route::get('/ListUsers', [App\Http\Controllers\UserControllers::class, 'index']);
Route::post('/SaveUser', [App\Http\Controllers\UserControllers::class, 'store']);
Route::post('/getUser', [App\Http\Controllers\UserControllers::class, 'show']);
Route::post('/editUser', [App\Http\Controllers\UserControllers::class, 'edit']);
Route::post('/SaveEditUser', [App\Http\Controllers\UserControllers::class, 'update']);
Route::get('/getdataEstruc/{Typedata}', [App\Http\Controllers\EstructuraController::class, 'getdata']);
Route::post('/getdataInvest', [App\Http\Controllers\EstructuraController::class, 'getdataInvest']);
Route::get('/getdataItem', [App\Http\Controllers\EstructuraController::class, 'getdataItem']);
Route::post('/SaveEstruc', [App\Http\Controllers\EstructuraController::class, 'store']);
Route::post('/EditEstruc', [App\Http\Controllers\EstructuraController::class, 'saveEdit']);
Route::post('/DeshEstruc', [App\Http\Controllers\EstructuraController::class, 'DeshEstruc']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
