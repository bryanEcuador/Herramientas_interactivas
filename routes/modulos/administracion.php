<?php

// protección de rutas
Route::middleware(['auth','administracion'])->group(function () {
    Route::group(['prefix' => 'administracion' , 'as' => 'admin.' ], function() {
        route::get('gestion','AdministracionController@gestion');
        route::post('guardar_preguntas','AdministracionController@guardarPreguntas');
        //route::put('actualizar_estado','AdministracionController@updatePregunta');
        route::get('preguntas/edit/{id}','AdministracionController@editPregunta');
        route::post('update_preguntas/{id?}','AdministracionController@updatePregunta');
        route::get('preguntas','AdministracionController@preguntas')->name('preguntas');
    });
});
