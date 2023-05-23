<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('laboratorio1', [App\Http\Controllers\Laboratorio1Controller::class, 'crearReactivo'])->name('postReactivo');
Route::get('laboratorio1/ver', [App\Http\Controllers\Laboratorio1Controller::class, 'verReactivos'])->name('viewReactivo');
Route::post('/buscar-reactivos',  [App\Http\Controllers\Laboratorio1Controller::class, 'buscarReactivos'])->name('buscarReactivos');
