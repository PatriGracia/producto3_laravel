<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ActoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('eventos', InicioController::class)->name('home'); 

Route::controller(PersonaController::class)->group(function(){
    Route::get('personas', 'index');

    Route::get('personas/create', 'create')->name('personas.create');

    Route::get('personas/{id}', 'show')->name('personas.show');
});

Route::controller(LoginController::class)->group(function(){
    Route::view('/login', 'auth/login')->name('login');

    Route::view('/registro', 'auth/registro')->name('registro');

    Route::view('/privada', 'prueba')->middleware('auth')->name('privada');

    Route::view('/admin', 'menu-admin/admin')->middleware('auth')->name('admin');

    Route::view('/usuario', 'menu-usuario/usuario')->middleware('auth')->name('usuario');

    Route::post('/validar-registro', 'register')->name('validar-registro');

    Route::post('/inicia-sesion', 'login')->name('inicia-sesion');

    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ActoController::class)->group(function(){
    Route::get('/acto', 'index')->middleware('auth')->name('acto.index');

    Route::post('/acto/showEvent', 'showEvent')->middleware('auth')->name('acto.showEvent');
    Route::post('/acto/datoInsc', 'datoInscribir')->middleware('auth')->name('acto.datoInscribir');

    Route::post('/acto/inscribirDesinscribir', 'inscribirDesinscribir')->middleware('auth')->name('acto.inscribirDesinscribir');

});

Route::controller(PerfilController::class)->group(function(){
    Route::get('/perfil', 'index')->middleware('auth')->name('perfil.index');

    Route::post('/modificar', 'modificar')->middleware('auth')->name('perfil.modificar');
});

Route::controller(AdminController::class)->group(function(){
    Route::view('/admin', 'menu-admin/admin')->middleware('auth')->name('admin');

    
});
/*Route::controller(FullCalendarController::class)->group(function(){

    
    Route::get('/listarActos', 'listarActos')->name('listarActos');;

    Route::get('calendar-event', 'index');

    Route::post('calendar-crud-ajax', 'calendarEvents');

    //Route::get('personas/create', 'create')->name('personas.create');

    //Route::get('personas/{id}', 'show')->name('personas.show');
});*/


//Route::get('registro', [RegistroController::class, 'index'])->name('registro');

//Route::get('login', [LoginController::class, 'index'])->name('login');






// Route::get('users/{id}', function ($id) {
    
// });
// Route::get('users/{id}/{Nombre?}', function ($id, $nombre) {
    
// });

// Route::get('/registro', function () {
//     return view('registro');
// });

//Route::get('/', [WebController::class, 'inicio']);

//Route::get('/registro', [RegistroController::class, 'registro']);

//Route::get('/login', [LoginController::class, 'login']);

