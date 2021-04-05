<?php

use App\Http\Controllers\Apicontrollers;
use App\Http\Controllers\EnvioController;
use App\Http\Livewire\Contratos\Contratos;
use App\Http\Livewire\Empleado\EmpleadoIndex;
use App\Http\Livewire\Empleado\EmpleadoPerfil;
use App\Http\Livewire\Permisos\PermisosJefe;
use App\Http\Livewire\Permisos\PermisosEmpleados;
use App\Http\Controllers\EmpleadoController;
use App\Http\Livewire\Cargos\Cargos;
use App\Mail\EnvioMasivo;
use App\Models\cargo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Permisos\PermisosRrhh;
use App\Models\permisos;

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
    //

    Route::get('/empleado/perfil/{id}', EmpleadoPerfil::class )->name('empleado.perfil');
    Route::get('/empleado/listarempleados', [EmpleadoPerfil::class, 'listarempleados'] )->name('listarempleados');

    Route::get('/empleado', EmpleadoIndex::class,)->name('empleado.index');

    //Departamentos y Municipios
    Route::get('/empleado/deptos_pais', [EmpleadoController::class, 'getDeptos']);
    Route::get('/empleado/municipio/{idDepto}', [EmpleadoController::class, 'getMunicipios']);

    //Gestiones de Empleado
    Route::post('/empleado/store', [EmpleadoController::class, 'store']);
    Route::post('/empleado/editar/{id}', [EmpleadoController::class, 'update']);
    Route::post('/empleado/eliminar/{id}', [EmpleadoController::class, 'destroy']);

    //BusquedaEmpleados
    Route::get('/empleado/deptos', [EmpleadoController::class, 'getDeptosEmpleado']);
    Route::get('/empleado/area/{idDeptos}', [EmpleadoController::class, 'getAreaEmpleado']);
    Route::get('/empleado/cargo/{idAreas}', [EmpleadoController::class, 'getCargoEmpleado']);



     // listar gerentes
     Route::get('/gerente', [Apicontrollers::class, 'gerente']);
     Route::get('/empleado_contrato', [Apicontrollers::class, 'empleado_contrato']);
     Route::get('/area/{id}', [Apicontrollers::class, 'area']);


     //contratos de empleados
     Route::get('/contratos', Contratos::class)->name('contratos.index');

     Route::post('/contratos/show', [Contratos::class, 'contrato_show'])->name('contratos.show');


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






    });




// Route::get('/empleado', [EmpleadoIndex::class.'create'],  )->name('empleado.create');
// Route::get('/empleado', [EmpleadoIndex::class.'delete'],  )->name('empleado.delete');
