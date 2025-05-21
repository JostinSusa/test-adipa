<?php

/**
 * Application routes.
 */
Route::middleware(['wp.admin'])->group(function(){
    Route::get('/personas', function() {
        return 'Estas en la ruta personas';
    });
});
Route::get('/', function () {
    return view('welcome');
});

