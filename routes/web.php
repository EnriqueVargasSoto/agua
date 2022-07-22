<?php

use App\Http\Controllers\Admin\CicloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\ConceptoController;
use App\Http\Controllers\Admin\DetalleCicloController;
use App\Http\Controllers\Admin\DocumentoController;
use App\Http\Controllers\Admin\GastoController;
use App\Http\Controllers\Admin\ReclamoController;
use App\Http\Controllers\Usuario\ContactoController;
use App\Http\Controllers\Usuario\SeguridadController;
use App\Http\Controllers\Usuario\DatosController;
use App\Http\Controllers\Usuario\SuministroController;
use App\Http\Controllers\Usuario\ReciboController;
use App\Models\Rol;

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
Route::post('/registrar-solicitud-manual', [PerfilController::class, 'storeDesdeAdmin'])->name('storeDesdeAdmin.solicitud');
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
Route::post('suministro-registrar', [App\Http\Controllers\Admin\SuministroController::class, 'store'])->name('store.suministros');

Route::get('reclamos', [ReclamoController::class, 'index'])->name('reclamos.index');
Route::get('reclamo-create', [ReclamoController::class, 'create'])->name('reclamos.create');
Route::post('reclamo-store', [ReclamoController::class, 'store'])->name('reclamos.store');

Route::get('gastos-list', [GastoController::class, 'index'])->name('gastos.index');
Route::post('gasto-store', [GastoController::class, 'store'])->name('gastos.store');
Route::put('gasto-update/{id}', [GastoController::class, 'update'])->name('gastos.update');
Route::get('gasto-delete/{id}', [GastoController::class, 'destroy'])->name('gastos.destroy');

Route::get('documentos-list', [DocumentoController::class, 'index'])->name('documentos.index');
Route::post('documento-store', [DocumentoController::class, 'store'])->name('documentos.store');
Route::put('documento-update/{id}', [DocumentoController::class, 'update'])->name('documentos.update');
Route::get('documento-delete/{id}', [DocumentoController::class, 'destroy'])->name('documentos.destroy');

Route::get('web-reclamos', [WebController::class, 'reclamos'])->name('reclamos.web');
Route::get('web-reclamos-store', [WebController::class, 'reclamoStore'])->name('reclamos.web.store');

Route::post('resultado', [WebController::class, 'buscar'])->name('resultado');

Route::get('ciclos', [CicloController::class, 'index'])->name('ciclos.index');
Route::post('ciclos-store', [CicloController::class, 'store'])->name('ciclos.store');
Route::get('ciclos-delete/{id}', [CicloController::class, 'destroy'])->name('ciclos.destroy');

Route::get('ciclo-detalle/{id}', [DetalleCicloController::class, 'detalle'])->name('detalle.index');
Route::post('genera-recibos', [DetalleCicloController::class, 'creaRecibo'])->name('recibos.create');

Route::get('recibo-ver/{id}', [ReciboController::class, 'verRecibo'])->name('recibo.ver');