<?php

Route::resource('users', 'UserController', ['as' => 'administrador']);
Route::resource('servicios', 'ServicioController', ['as' => 'administrador']);
Route::resource('previsiones', 'PrevisionController', [
    'as' => 'administrador',
    'parameters' => ['previsiones' => 'prevision']
]);

Route::get('logs', 'LogController@index')->name('administrador.logs.index');
Route::post('logs', 'LogController@find')->name('administrador.logs.find');

Route::get('configuracion', 'ConfiguracionController@index')->name('administrador.configuracion.index');
Route::post('configuracion', 'ConfiguracionController@cambiarPassword')->name('administrador.configuracion.cambiarPassword');