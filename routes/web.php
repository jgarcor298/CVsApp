<?php

use Illuminate\Support\Facades\Route;
use App\Models\Alumno;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ImagenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MainController::class, 'main']) -> name('main');


// Alumno Controller 
Route::get('alumno', [AlumnoController::class, 'index'])->name('alumno.index');
Route::get('alumno/create', [AlumnoController::class, 'create'])->name('alumno.create');
Route::post('alumno', [AlumnoController::class, 'store'])->name('alumno.store');
Route::get('alumno/{alumno}', [AlumnoController::class, 'show'])->name('alumno.show');
Route::get('alumno/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumno.edit');
Route::put('alumno/{alumno}', [AlumnoController::class, 'update'])->name('alumno.update');
Route::delete('alumno/{alumno}', [AlumnoController::class, 'destroy'])->name('alumno.destroy');

// Fotografia Controller
Route::get('fotografia/{id}', [ImagenController::class, 'imagen'])->name('fotografia.fotografia');