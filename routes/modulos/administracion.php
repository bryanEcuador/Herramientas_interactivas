<?php

// protección de rutas
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'Administracion' , 'as' => 'admin.' ], function() {

        route::get('gestion','AdministracionController@gestion');

    });
});
