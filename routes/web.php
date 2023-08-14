<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProblemasController;
use App\Models\Alumnos;
use App\Models\Niveles;
use App\Models\Cursos;

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
$idUsuario = !is_null(Auth::user()) ? Auth::user()->id : -1;

echo !is_null(Auth::user());

//evelyn

Route::resource('cursos',CursoController::class); //para acceder a todas las rutas de cursoss
Route::get('/menu-niveles/{id}', [App\Http\Controllers\NivelController::class, 'index'])->name('menu-niveles');
Route::get('/bloquear-niveles', [App\Http\Controllers\NivelController::class, 'mostrar'])->name('bloquear-niveles');
Route::get('/EstadoNivel', [App\Http\Controllers\NivelController::class, 'ActualizarEstado'])->name('EstadoNivel');



// Rutas del controlador de Perfiles "UsuarioController"


//Route::get('/perfil/show', [UsuarioController::class, "show"]);
//Santiago

Route::get('/perfil', [UsuarioController::class, "index"]);
Route::patch('/perfil', [UsuarioController::class, "update"]);
Route::delete('/perfil', [UsuarioController::class, "destroy"]);

//Route::resource('perfil', UsuarioController::class);

//Padilla

Route::get('/alumnos/listar', [AlumnosController::class, "select"]); // filtro para listar por curso
Route::get('/alumnos', [AlumnosController::class, "index"]); // index de la pagina de alumnos, donde se muestran la lista de alumnos
Route::get('/alumnos/create', [AlumnosController::class, "create"]); // lugar donde se crearan los nuevos alumnos
Route::post('/alumnos', [AlumnosController::class, "store"]); // guardar los datos al crear alumno
Route::get('/alumnos/{alu_id}/ver', [AlumnosController::class, "show"]); // Ver alumno
Route::delete('/alumnos/{alu_id}/delete', [AlumnosController::class, "destroy"]);
Route::get('alumnos/{alu_id}/edit', [AlumnosController::class, "edit"]); // Vista del editar
Route::post('alumnos/editado', [AlumnosController::class, "update"]); // Se guardan los cambios
Route::get('alumnos/{alu_id}/pdf', [PdfController::class, "generarPdfAlumno"]);


//Jazmin

Route::resource('comentario', ComentarioController::class);
Route::post('comentario/update', [ComentarioController::class, "update"]);

Route::resource('problemas',ProblemasController::class);

// Paulo