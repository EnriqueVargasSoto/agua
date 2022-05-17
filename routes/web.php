<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\ConceptoController;
use App\Http\Controllers\Usuario\ContactoController;
use App\Http\Controllers\Usuario\SeguridadController;
use App\Http\Controllers\Usuario\DatosController;
use App\Http\Controllers\Usuario\SuministroController;
use App\Http\Controllers\Usuario\ReciboController;

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

Route::get('/', [WebController::class, 'index'])->name('/');
Route::get('/nosotros', [WebController::class, 'nosotros'])->name('nosotros');
Route::get('/comite', [WebController::class, 'comite'])->name('comite');
Route::get('/contactanos', [WebController::class, 'contactanos'])->name('contactanos');
Route::get('/form-afiliacion', [WebController::class,'formAfiliado'])->name('form.afiliacion');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/nuevo-login', [UserController::class, 'login'])->name('nuevo.login');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/solicitudes', [PerfilController::class, 'index'])->name('solicitudes');
Route::post('/registrar-solicitud', [PerfilController::class, 'store'])->name('registrar.solicitud');
Route::get('/activa-usuario/{id}', [PerfilController::class, 'activaUsuario'])->name('activa.usuario');
Route::get('/elimina-perfil/{id}', [PerfilController::class, 'destroy'])->name('perfil.delete');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::get('/cambia-usuario/{id}', [UserController::class, 'cambiaEstado'])->name('usuario.cambia-estado');
Route::get('/eliminar-usuario/{id}', [UserController::class, 'destroy'])->name('usuario.delete');

Route::get('/conceptos', [ConceptoController::class, 'index'])->name('conceptos');
Route::post('/registra-concepto', [ConceptoController::class, 'store'])->name('store.concepto');
Route::put('/actualiza-concepto/{id}', [ConceptoController::class, 'update'])->name('update.concepto');
Route::get('/elimina-concepto/{id}', [ConceptoController::class, 'destroy'])->name('elimina.concepto');


Route::get('/contactanos-intranet', [ContactoController::class, 'index'])->name('contactanos.index');
Route::get('/seguridad', [SeguridadController::class, 'index'])->name('seguridad.index');
Route::post('/actualiza-password', [SeguridadController::class, 'updatePassword'])->name('actualiza.password');
Route::get('/mis-datos', [DatosController::class, 'index'])->name('datos.index');
Route::get('/suministros', [SuministroController::class, 'index'])->name('suministros.index');

Route::get('/lsitar-recibos/{id}', [ReciboController::class, 'listarRecibos']);

Route::get('/buscar-persona/{dni}', [WebController::class, 'buscarPersona']);

Route::get('admin/suministros', [App\Http\Controllers\Admin\SuministroController::class, 'index'])->name('suministros.admin');
Route::post('   suministro-registrar', [App\Http\Controllers\Admin\SuministroController::class, 'store'])->name('store.suministros');