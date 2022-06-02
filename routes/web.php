<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComentarioController;
// use App\Http\Controllers\MailController;
use App\Http\Controllers\UserControllers;
use App\Http\Controllers\ReporteController;

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
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

// Route::get('/courses',function () {
//     return view('courses');
// });

// Route::get('/catalogo', [App\Http\Controllers\ProyectoController::class, 'catalogo']);
Route::resource('/contact', App\Http\Controllers\ContactController::class);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Auth::routes();

//prueba de enviar correo
// Route::get('/send-email', [MailController::class, 'sendEmail']);
//prueba de enviar correo

Route::resource('proyecto',App\Http\Controllers\ProyectoController::class);
Route::get('proyecto/carta_compromiso/{id}', [ProyectoController::class,'pdf_carta_compromiso'])->name('proyecto.carta_compromiso');

Route::resource('comunidades',App\Http\Controllers\ComunidadeController::class);
Route::resource('tipos_comunidad',App\Http\Controllers\Tipos_comunidadeController::class);

Route::resource('necesidad',App\Http\Controllers\NecesidadeController::class);
Route::get('necesidad/evaluate/{id}',[App\Http\Controllers\NecesidadeController::class, 'evaluate'])->name('evaluate');
Route::post('banco',[App\Http\Controllers\NecesidadeController::class, 'banca_create'])->name('banco');
Route::get('situacion',[App\Http\Controllers\NecesidadeController::class, 'banca_list']);
Route::resource('testimonio',App\Http\Controllers\TestimonioController::class);

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

Route::get('usuarios', [UserControllers::class,'index'])->middleware('can:usuarios.index')->name('usuarios.index');//

Route::get('usuarios/create', [UserControllers::class,'create'])->middleware('can:usuarios.create')->name('usuarios.create');//

Route::post('usuarios', [UserControllers::class,'store'])->middleware('can:usuarios.store')->name('usuarios.store');//

Route::get('usuarios/show', [UserControllers::class,'show'])->middleware('can:usuarios.show')->name('usuarios.show');//

Route::get('usuarios/pdf', [UserControllers::class,'pdf'])->name('usuarios.pdf');//->middleware('can:usuarios.pdf')

Route::get('usuarios/{user}/pdfusuario', [UserControllers::class,'pdfusuario'])->name('usuarios.pdfusuario');//  ->middleware('can:usuarios.pdf')
Route::get('usuarios/{user}/edit', [UserControllers::class,'edit'])->middleware('can:usuarios.edit')->name('usuarios.edit');//
Route::put('usuarios/{user}', [UserControllers::class,'update'])->middleware('can:usuarios.update')->name('usuarios.update');//
Route::delete('usuarios/{user}', [UserControllers::class,'destroy'])->middleware('can:usuarios.destroy')->name('usuarios.destroy');//
Route::get('reporte', [ReporteController::class,'index'])->middleware('can:reporte')->name('reporte');//->middleware('can:reporte.pdf')
Route::get('reporte/pdf', [ReporteController::class,'pdf'])->middleware('can:reporte.pdf')->name('reporte.pdf');//->middleware('can:reporte.pdf')

//Route::resource('usuarios',UserControllers::class);


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
