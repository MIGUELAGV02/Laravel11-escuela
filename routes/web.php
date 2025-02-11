<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAPI;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\CarreraController;

Route::get('/', [ControllerAPI::class, 'getData'])->name('alumno.index');
Route::get('alumnos/create', [ControllerAPI::class, 'create' ])->name('alumno.create');
Route::post('alumnos', [ControllerAPI::class, 'store' ])->name('alumno.store');
Route::get('alumnos/{id_alumno}', [ControllerAPI::class, 'getData2'] )->name('alumno.show');
Route::get('alumnos/{id_alumno}/edit', [ControllerAPI::class, 'edit' ])->name('alumno.edit');
Route::put('alumnos/{id_alumno}', [ControllerAPI::class, 'update' ])->name('alumno.update');
Route::delete('alumnos/{id_alumno}', [ControllerAPI::class, 'delete' ])->name('alumno.destroy');

Route::get('universidades', [UniversidadController::class, 'index'])->name('universidad.index');
Route::get('universidades/create', [UniversidadController::class, 'create' ])->name('universidad.create');
Route::post('universidades', [UniversidadController::class, 'store' ])->name('universidad.store');
Route::get('universidades/{id_universidad}', [UniversidadController::class, 'show'] )->name('universidad.show');
Route::get('universidades/{id_universidad}/edit', [UniversidadController::class, 'edit' ])->name('universidad.edit');
Route::put('universidades/{id_universidad}', [UniversidadController::class, 'update' ])->name('universidad.update');
Route::delete('universidades/{id_universidad}', [UniversidadController::class, 'delete' ])->name('universidad.destroy');

Route::get('carreras', [CarreraController ::class, 'index'])->name('carrera.index');
Route::get('carreras/create', [CarreraController::class, 'create' ])->name('carrera.create');
Route::post('carreras', [CarreraController::class, 'store' ])->name('carrera.store');
Route::get('carreras/{id_carrera}', [CarreraController::class, 'show'] )->name('carrera.show');
Route::get('carreras/{id_carrera}/edit', [CarreraController::class, 'edit' ])->name('carrera.edit');
Route::put('carreras/{id_carrera}', [CarreraController::class, 'update' ])->name('carrera.update');
Route::delete('carreras/{id_carrera}', [CarreraController::class, 'delete' ])->name('carrera.delete');

Route::get('grupos', [GrupoController::class, 'index'])->name('grupo.index');
Route::get('grupos/create', [GrupoController::class, 'create' ])->name('grupo.create');
Route::post('grupos', [GrupoController::class, 'store' ])->name('grupo.store');
Route::get('grupos/{mostrar}', [GrupoController::class, 'show'] )->name('grupo.show');
Route::get('grupos/{editar}/edit', [GrupoController::class, 'edit' ])->name('grupo.edit');
Route::put('grupos/{editar}', [GrupoController::class, 'update' ])->name('grupo.update');
Route::delete('grupos/{eliminar}', [GrupoController::class, 'destroy' ])->name('grupo.destroy');



