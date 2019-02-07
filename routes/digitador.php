<?php

Route::get('pagare/deudor-deuda', 'PagareController@createDeudorDeuda')->name('pagare.deudor-deuda.create');
Route::post('pagare/deudor-deuda', 'PagareController@storeDeudorDeuda')->name('pagare.deudor-deuda.store');
Route::get('pagare/deudor/{deudor}/edit', 'PagareController@editDeudor')->name('pagare.deudor.edit');
Route::put('pagare/deudor/{deudor}', 'PagareController@updateDeudor')->name('pagare.deudor.update');

Route::get('pagare/deuda/{deuda}/edit', 'PagareController@editDeuda')->name('pagare.deuda.edit');
Route::put('pagare/deuda/{deuda}', 'PagareController@updateDeuda')->name('pagare.deuda.update');

Route::get('pagare/copiar/{pagare}/paciente', 'PagareController@copiarDeudor')->name('pagare.paciente.copiar');
Route::get('pagare/{pagare}/paciente', 'PagareController@createPaciente')->name('pagare.paciente.create');
Route::post('pagare/paciente', 'PagareController@storePaciente')->name('pagare.paciente.store');
Route::get('pagare/paciente/{paciente}/edit', 'PagareController@editPaciente')->name('pagare.paciente.edit');
Route::put('pagare/paciente/{paciente}', 'PagareController@updatePaciente')->name('pagare.paciente.update');

Route::get('pagare/{pagare}/codeudor', 'PagareController@createCodeudor')->name('pagare.codeudor.create');
Route::post('pagare/codeudor', 'PagareController@storeCodeudor')->name('pagare.codeudor.store');
Route::get('pagare/codeudor/{codeudor}/edit', 'PagareController@editCodeudor')->name('pagare.codeudor.edit');
Route::put('pagare/codeudor/{codeudor}', 'PagareController@updateCodeudor')->name('pagare.codeudor.update');

Route::get('pagare/mandato/{pagare}', 'PagareController@createMandato')->name('pagare.mandato.create');
Route::post('pagare/mandato', 'PagareController@storeMandato')->name('pagare.mandato.store');
Route::get('pagare/mandato/{mandato}/edit', 'PagareController@editMandato')->name('pagare.mandato.edit');
Route::put('pagare/mandato/{mandato}', 'PagareController@updateMandato')->name('pagare.mandato.update');

Route::get('pagare/pago/{pagare}', 'PagareController@createPago')->name('pagare.pago.create');
Route::post('pagare/pago', 'PagareController@storePago')->name('pagare.pago.store');

Route::put('pagare/validar/{pagare}', 'PagareController@updateEstado')->name('pagare.estado.update');

Route::get('pagare/{pagare}/visualizar', 'PagareController@view')->name('pagare.view');
Route::get('pagare/{pagare}/imprimir', 'PagareController@print')->name('pagare.print');

Route::get('index', 'InicioController@index')->name('digitador.index');
Route::post('index/buscador/codigo', 'InicioController@findCodigo')->name('digitador.buscar.codigo');
Route::post('index/buscador/numero', 'InicioController@findNumero')->name('digitador.buscar.numero');
Route::post('index/buscador/rut', 'InicioController@findRut')->name('digitador.buscar.rut');
Route::get('index/buscador/misPagare', 'InicioController@misPagare')->name('digitador.buscar.mispagare');
Route::get('index/buscador/sinValidar', 'InicioController@sinValidar')->name('digitador.buscar.sinValidar');

Route::get('configuracion', 'ConfiguracionController@index')->name('digitador.configuracion.index');
Route::post('configuracion', 'ConfiguracionController@cambiarPassword')->name('digitador.configuracion.cambiarPassword');


// NUEVO CODIGO


Route::post('index/buscar/paciente', 'InicioController@findPaciente')->name('digitador.buscar.paciente');
Route::get('pagare/{pagare}/view', 'PagareController@view')->name('digitador.pagare.view');
Route::post('index/buscar/peticion', 'InicioController@peticion_ajax')->name('digitador.buscar.peticion');