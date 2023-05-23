<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ActoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PonenteController;

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

Route::controller(PonenteController::class)->group(function(){
    Route::get('/ponente', 'index')->middleware('auth')->name('ponente.index');

    Route::post('/ponente/showEvent', 'showEvent')->middleware('auth')->name('ponente.showEvent');
    Route::post('/ponente/datoInsc', 'datoInscribir')->middleware('auth')->name('ponente.datoInscribir');

    Route::post('/ponente/inscribirDesinscribir', 'inscribirDesinscribir')->middleware('auth')->name('ponente.inscribirDesinscribir');

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

