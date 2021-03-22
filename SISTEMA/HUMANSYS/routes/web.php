<?php

use App\Http\Controllers\EnvioController;
use App\Http\Livewire\Contratos\Contratos;
use App\Http\Livewire\Empleado\EmpleadoIndex;
use App\Http\Livewire\Empleado\EmpleadoPerfil;
use App\Http\Livewire\Permisos\Permisos;
use App\Http\Livewire\Permisos\PermisosEmpleados;
use App\Http\Controllers\EmpleadoController;
use App\Mail\EnvioMasivo;
use Illuminate\Support\Facades\Route;

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
    Route::post('/empleado/store', [EmpleadoIndex::class, 'guardarEmpleado']);


    });


    //contratos de empleados
    Route::get('/contratos', Contratos::class)->name('contratos.index');


    // permisos empleados
    Route::get('/permisos', Permisos::class )->name('permisos.index');
    Route::get('/permisosempleados', PermisosEmpleados::class )->name('permisos.index_empleado');
    Route::get('/listado/permisos', [PermisosEmpleados::class, 'obtenerPermisos']);








// Route::get('/empleado', [EmpleadoIndex::class.'create'],  )->name('empleado.create');
// Route::get('/empleado', [EmpleadoIndex::class.'delete'],  )->name('empleado.delete');
