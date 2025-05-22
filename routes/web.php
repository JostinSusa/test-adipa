<?php

use App\Http\Controllers\PersonaController;

/**
 * Application routes.
 */
Route::middleware(['wp.admin'])->group(function(){
    Route::get('/persona', [PersonaController::class, 'index'])->name('persona.index');
    Route::get('/persona/create', [PersonaController::class, 'create'])->name('persona.create');
    Route::get('/persona/edit/{id}', [PersonaController::class, 'edit'])->name('persona.edit');
    Route::get('/persona/{id}', [PersonaController::class, 'show'])->name('persona.show');
    Route::post('/persona', [PersonaController::class, 'store'])->name('persona.store');
    Route::put('/persona/{id}', [PersonaController::class, 'update'])->name('persona.update');
    Route::delete('/persona/{id}', [PersonaController::class, 'destroy'])->name('persona.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

