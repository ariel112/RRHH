<?php

use App\Http\Controllers\EnvioController;
use App\Http\Livewire\Empleado\EmpleadoIndex;
use App\Http\Livewire\Empleado\EmpleadoPerfil;
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
    
    Route::get('/empleado', EmpleadoIndex::class,  )->name('empleado.index');

});    




// Route::get('/empleado', [EmpleadoIndex::class.'create'],  )->name('empleado.create');
// Route::get('/empleado', [EmpleadoIndex::class.'delete'],  )->name('empleado.delete');