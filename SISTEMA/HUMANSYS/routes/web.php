<?php

use App\Http\Controllers\Apicontrollers;
use App\Http\Controllers\EnvioController;
use App\Http\Livewire\Contratos\Contratos;
use App\Http\Livewire\Deducciones\DeduccionesIndex;
use App\Http\Livewire\Empleado\EmpleadoIndex;
use App\Http\Livewire\Empleado\EmpleadoPerfil;
use App\Http\Livewire\Permisos\PermisosJefe;
use App\Http\Livewire\Permisos\PermisosEmpleados;
use App\Http\Controllers\EmpleadoController;
use App\Http\Livewire\Asistencia\Asistencia;
use App\Http\Livewire\Asistencia\Marcaje;
use App\Http\Livewire\Asistencia\ListaAsistencia;
use App\Http\Livewire\Cargos\Cargos;
use App\Mail\EnvioMasivo;
use App\Models\cargo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Permisos\PermisosRrhh;
use App\Http\Livewire\Planilla\Planilla;
use App\Http\Livewire\Planilla\CrearPlanilla;
use App\Http\Livewire\Planilla\Planilla as PlanillaPlanilla;
use App\Models\permisos;
use App\Http\Controllers\DeduccionesController;
use App\Http\Livewire\Deducciones\Deducciones;
use App\Http\Controllers\AsistenciasController;
use App\Http\Livewire\Deducciones\DeduccionesVariables;
use App\Http\Livewire\Asistencia\MarcajeEmpleado;
use App\Http\Livewire\Feriados\Feriados;
use App\http\Livewire\Salidas\SalidasMedioDia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\User\Users;
use App\Http\Livewire\Asistencia\MatrisAsistencia;

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
Route::post('/empleado/deducciones/fijas/{id}', [EmpleadoController::class, 'guardarMontosDeduccionesFijas']);
Route::get('/', function () {
    return view('auth.login');
});

/* Route::get('/envio', function () {
    Mail::to("yefryyo@gmail.com")->send(new EnvioMasivo("Yefry"));
    return view('auth.login');
}); */

Route::get('/envio', [EnvioController::class, 'index'] );

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/empleado/perfil/{id}', EmpleadoPerfil::class )->name('empleado.perfil');
    Route::get('/empleado/listarempleados', [EmpleadoPerfil::class, 'listarempleados'] )->name('listarempleados');

    Route::get('/empleado', EmpleadoIndex::class,)->name('empleado.index');

    //Departamentos y Municipios
    Route::get('/empleado/deptos_pais', [EmpleadoController::class, 'getDeptos']);
    Route::get('/empleado/municipio/{idDepto}', [EmpleadoController::class, 'getMunicipios']);

    //Gestiones de Empleado
    Route::post('/empleado/guardar', [EmpleadoController::class, 'guardar']);
    Route::post('/empleado/editar', [EmpleadoController::class, 'update']);
    Route::post('/empleado/referencia/{id}', [EmpleadoController::class, 'guardarReferencia']);
    Route::get('/empleado/referencia/get/{id}', [EmpleadoController::class, 'getReferencias']);
    Route::post('/empleado/editar/referencia/{id}', [EmpleadoController::class, 'updateReferencia']);
    Route::post('/empleado/deducciones', [EmpleadoController::class, 'guardarDeduccion']);
    Route::get('/empleado/deducciones/desactivar/{id}', [EmpleadoController::class, 'desactivarDeduccion']);
    Route::get('/tipoDeduccionVariable', [EmpleadoController::class, 'gettipodeducVariable']);
    Route::get('/empleado/cambio_estado/{id_empleado_estado}/{estado}', [EmpleadoController::class, 'cambio_estado_empleado_contrato']);



    //Marcaje de sistencias
    Route::get('/marcaje', Marcaje::class,)->name('asistencia.marcaje');
    Route::get('/marcaje/listar', [Marcaje::class, 'listar_marcaje']);
    Route::get('/marcaje/entrada/{id}', [AsistenciasController::class, 'marcajeDeEntrada']);
    Route::get('/marcaje/salida/{id}', [AsistenciasController::class, 'marcajeDeSalida']);
    Route::get('/marcaje-empleado', MarcajeEmpleado::class,)->name('asistencia.marcaje-empleado');

    //Feriados
    Route::get('/feriados', Feriados::class,)->name('feriados.feriados');
    Route::get('/feriados/listar', [Feriados::class, 'listar_feriados']);
    Route::post('/feriado/guardar', [Feriados::class, 'addFeriado']);
    Route::get('/feriado/estado/{idFeriado}', [Feriados::class, 'cambio_estado_feriado']);
    Route::get('/feriado/muestra/{id}', [Feriados::class, 'getFeriadoEdit']);
    Route::post('/feriado/editar', [Feriados::class, 'editFeriado']);

    //usuarios
    Route::get('/usuarios', Users::class,)->name('user.users');
    Route::get('/fueradered', Users::class,)->name('user.fueradered');
    Route::get('/tipoUsers', [Users::class, 'listar_tipos']);
    Route::post('/empleado/tipoUsuario', [Users::class, 'guardarTipoUsuario']);







    //BusquedaEmpleados
    Route::get('/empleado/deptos', [EmpleadoController::class, 'getDeptosEmpleado']);
    Route::get('/empleado/area/{idDeptos}', [EmpleadoController::class, 'getAreaEmpleado']);
    Route::get('/empleado/cargo/{idAreas}', [EmpleadoController::class, 'getCargoEmpleado']);


    //Deducciones
    Route::get('/deducciones', DeduccionesIndex::class )->name('deducciones.deducciones-index');
    Route::get('/deducciones/variantes', DeduccionesVariables::class )->name('deducciones.deducciones-variables');
    Route::post('/deducciones/guardar', [DeduccionesController::class, 'guardar']);
    Route::get('/deducciones_listar', [Deducciones::class, 'listar_deducciones']);
    Route::get('/deducciones/perfil_mostrar/{id}', Deducciones::class);
    Route::get('/deducciones_listar/perfil/{id}', [Deducciones::class, 'lista_techos']);
    Route::post('/techos/guardar', [DeduccionesController::class, 'guardarTechos']);
    Route::get('/deducciones/estado/{id}/{estatus}', [DeduccionesController::class, 'actualizarEstado']);
    Route::post('/techos/editar/{id}', [DeduccionesController::class, 'editTechos']);
    Route::get('/deduccion/get/{id}', [DeduccionesController::class, 'getDeducciones']);
    Route::post('/deducciones/edit/{id}', [DeduccionesController::class, 'editdeduccion']);
    Route::get('/tipoDeducVariante/listar', [DeduccionesVariables::class, 'listar_deducciones_variables']);
    Route::post('/deducVariantes/guardar', [DeduccionesVariables::class, 'guardarVariantes']);
    Route::get('/estadoVariantes/{id}/{idestado}', [DeduccionesVariables::class, 'estadoVariantes']);
    Route::get('/cargo/estadoVariante', [DeduccionesVariables::class, 'getEstadoVariante']);
    Route::get('/cargo/TipoDeducVariable', [DeduccionesVariables::class, 'geTipoDeducVariante']);
    Route::post('/deducVariantes/editar/{id}', [DeduccionesVariables::class, 'editarVariantes']);
    Route::get('/deduccionTipoVariable/mostrar/{id}', [DeduccionesVariables::class, 'mostrarTiposDeduccionesVariable']);

     // listar gerentes
     Route::get('/gerente', [Apicontrollers::class, 'gerente']);
     Route::get('/empleado_contrato', [Apicontrollers::class, 'empleado_contrato']);
     Route::get('/area/{id}', [Apicontrollers::class, 'area']);


     //contratos de empleados
     Route::get('/contratos', Contratos::class)->name('contratos.index');

     Route::post('/contratos/show', [Contratos::class, 'contrato_show'])->name('contratos.show');

     Route::get('/contratos/listar', [Contratos::class, 'contrato_listar'])->name('contratos.listar');
     Route::get('/contratos/muestra/{id}', [Contratos::class, 'contrato_muestra'])->name('contratos.muestra');
     Route::post('/contratos/edit', [Contratos::class, 'contratos_edit'])->name('contratos.edit');
     Route::get('/contratos/elimina/{id}', [Contratos::class, 'contrato_elimina'])->name('contratos.elimina');
    // ruta para generear contrato pdf
    Route::get('/contrato/generate-pdf/{id}', [Contratos::class, 'generatePDF']);
    // generar pdf sin formato
    Route::get('/contrato/generate-pdf_sin/{id}', [Contratos::class, 'generatePDF_sin']);

     // permisos empleados
     Route::get('/permisos', PermisosJefe::class )->name('permisos.index');
     Route::get('/permisosempleados', PermisosEmpleados::class )->name('permisos.index_empleado');
     Route::get('/permisosempleadosrrhh', PermisosRrhh::class )->name('permisos.index_rrhh');

     Route::get('/listado/permisos', [PermisosEmpleados::class, 'obtenerPermisos']);
     Route::post('/permiso/empleado/guardar', [PermisosEmpleados::class, 'guardarPermiso']);
     Route::get('/listar/permisos/solicitados', [PermisosEmpleados::class, 'listarPermisosEmpleados']);
     Route::put('/datos/permiso/{id}', [PermisosEmpleados::class, 'datosActualizarPermiso']);
     Route::put('/editar/permiso', [PermisosEmpleados::class, 'editarPermiso']);
     //permisos jefe inmediato
     Route::get('/listar/permisos/jefe',[permisosJefe::class, 'listarPermisosJefe']);
     Route::put('/aprobar/permiso/{id}', [permisosJefe::class, 'aprobarPermiso']);
     Route::put('/denegar/permiso/{id}', [permisosJefe::class, 'denegarPermiso']);
     Route::post('guardar/permiso/jefe', [permisosJefe::class, 'guardarPermisoJefe']);
     //permisos RRHH
     Route::get('/listar/permisos/rrhh',[PermisosRrhh::class, 'listarPermisosRRHH']);
     Route::put('/aprobar/permiso/rrhh/{id}', [PermisosRrhh::class, 'aprobarPermisoRRHH']);
     Route::put('/denegar/permiso/rrhh/{id}', [PermisosRrhh::class, 'denegarPermisoRRHH']);
     Route::get('/panel/rrhh',[PermisosRrhh::class, 'panelControlRRHH']);
     Route::post('guardar/permiso/rrhh', [PermisosRrhh::class, 'guardarPermisoRRHH']);






      // cargos crear
      Route::get('/cargos', Cargos::class )->name('cargos.index');
      //guardar cargos
      Route::post('/cargos/guardar', [Cargos::class, 'cargo_show']);

      Route::get('/cargos/listar', [Cargos::class, 'cargo_listar']);

      // muestro cargos
      Route::get('/cargos/muestra/{id}', [Cargos::class, 'cargo_muestra']);

      Route::post('/cargos/edit', [Cargos::class, 'cargos_edit'])->name('cargos.edit');

      //   eliminar funciones
      Route::get('/cargos/funciones/eliminar/{id}', [Cargos::class, 'eliminar_funciones'])->name('eliminar_funciones');

      //asistencias
      Route::get('/asistencia', Asistencia::class)->name('asistencia.index');
      Route::POST('/asistencia/buscar', [Asistencia::class, 'asistencia_matriz'])->name('asistencia.buscar');

      // lista empleado
      Route::POST('/asistencia/lista', ListaAsistencia::class )->name('lista.asistencia');



    //   planilla de empleados
    Route::get('/planilla', Planilla::class)->name('planilla.index');
    Route::get('/planilla/generar', CrearPlanilla::class)->name('generar.index');
    Route::post('/planilla/crear', [CrearPlanilla::class, 'generarPlanilla']);//generarSinDeducciones
    Route::post('/planilla/crear/sinDeducciones', [CrearPlanilla::class, 'generarSinDeducciones']);

    // asistencia de medio  dia
    Route::get('/medio/dia', SalidasMedioDia::class )->name('salida.index');
    Route::get('/listar/empleados/medio/dia', [SalidasMedioDia::class, 'listarEmpleados']);
    Route::post('/guardar/salida', [SalidasMedioDia::class, 'guardarSalidas']);

    //matris de de asistencia
    Route::get('/matriz/asistencia', MatrisAsistencia::class)->name('matriz.index');
    Route::get('/matriz/empleado/asistencia', [MatrisAsistencia::class, 'obtenerMatriz']);


    });




// Route::get('/empleado', [EmpleadoIndex::class.'create'],  )->name('empleado.create');
// Route::get('/empleado', [EmpleadoIndex::class.'delete'],  )->name('empleado.delete');
