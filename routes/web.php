<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Comp\Detallesdegremio;

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
})->name('welcome');

Route::get('/calculadoradesemillas', function () {
    return view('componentes/calculadoradesemillas');
})->name('calculadora de semillas');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/linhir', function () {
        return view('componentes/linhir');
    })->name('linhir');

    Route::get('/configuraciones', function () {
        return view('componentes/configuraciones');
    })->name('configuraciones');

    Route::get('/actividades', function () {
        return view('componentes/actividades');
    })->name('actividades');

    Route::get('/gremios', function () {
        return view('componentes/gremios');
    })->name('gremios');

    Route::get('/gremio/{slug}', Detallesdegremio::class)->name('gremio');

    
});


