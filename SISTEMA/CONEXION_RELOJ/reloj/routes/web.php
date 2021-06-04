<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataReloj;


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

Route::get('/sql/data',[dataReloj::class, 'getData'] );
Route::get('/sql/data/salida',[dataReloj::class, 'setData'] );
