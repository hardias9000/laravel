<?php

use App\Http\Controllers\ContactoConntroller;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ContactoConntroller::class, 'index'])->name('contacto.index');
Route::get('/registros', [contactoConntroller::class, 'registros'])->name('contacto.registros');
Route::post('/guardar-mensaje', [ContactoConntroller::class, 'guardarMensaje'])->name('contacto.guardar');
