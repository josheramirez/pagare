<?php

Route::get('pagare/deudor-deuda', 'PagareController@createDeudorDeuda')->name('supervisor.pagare.deudor-deuda.create');
Route::post('pagare/deudor-deuda', 'PagareController@storeDeudorDeuda')->name('supervisor.pagare.deudor-deuda.store');
Route::get('pagare/deuda/{deuda}/edit', 'PagareController@editDeuda')->name('supervisor.pagare.deuda.edit');
Route::put('pagare/deuda/{deuda}', 'PagareController@updateDeuda')->name('supervisor.pagare.deuda.update');
Route::get('pagare/copiar/{pagare}/paciente', 'PagareController@copiarDeudor')->name('supervisor.pagare.paciente.copiar');
Route::put('pagare/anular/{pagare}', 'PagareController@updateEstadoAnular')->name('supervisor.pagare.estado.anular');
Route::put('pagare/judicial/{pagare}', 'PagareController@updateEstadoJudicial')->name('supervisor.pagare.estado.judicial');

/*
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
 */



Route::get('index', 'InicioController@index')->name('supervisor.index');
Route::post('index/buscar/codigo', 'InicioController@findCodigoa')->name('supervisor.buscar.codigo');
Route::post('index/buscar/numero', 'InicioController@findNumero')->name('supervisor.buscar.numero');
Route::post('index/buscar/rut', 'InicioController@findRut')->name('supervisor.buscar.rut');

Route::post('index/buscar/paciente', 'InicioController@findPaciente')->name('supervisor.buscar.paciente');

Route::get('index/buscar/sinValidar', 'InicioController@sinValidar')->name('supervisor.buscar.sinValidar');

Route::get('pagare/{pagare}/view', 'PagareController@view')->name('supervisor.pagare.view');
Route::get('pagare/{pagare}/print', 'PagareController@print')->name('supervisor.pagare.print');

Route::get('pagare/deudor-deuda', 'PagareController@createDeudorDeuda')->name('supervisor.pagare.deudor-deuda.create');
Route::post('pagare/deudor-deuda', 'PagareController@storeDeudorDeuda')->name('supervisor.pagare.deudor-deuda.store');
Route::get('pagare/deudor/{deudor}/edit', 'PagareController@editDeudor')->name('supervisor.pagare.deudor.edit');
Route::put('pagare/deudor/{deudor}', 'PagareController@updateDeudor')->name('supervisor.pagare.deudor.update');

Route::get('pagare/codeudor/{codeudor}/edit', 'PagareController@editCodeudor')->name('supervisor.pagare.codeudor.edit');
Route::put('pagare/codeudor/{codeudor}', 'PagareController@updateCodeudor')->name('supervisor.pagare.codeudor.update');

Route::get('pagare/paciente/{paciente}/edit', 'PagareController@editPaciente')->name('supervisor.pagare.paciente.edit');
Route::put('pagare/paciente/{paciente}', 'PagareController@updatePaciente')->name('supervisor.pagare.paciente.update');

Route::get('pagare/mandato/{pagare}', 'PagareController@createMandato')->name('supervisor.pagare.mandato.create');
Route::post('pagare/mandato', 'PagareController@storeMandato')->name('supervisor.pagare.mandato.store');
Route::get('pagare/mandato/{mandato}/edit', 'PagareController@editMandato')->name('supervisor.pagare.mandato.edit');
Route::put('pagare/mandato/{mandato}', 'PagareController@updateMandato')->name('supervisor.pagare.mandato.update');

Route::get('pagare/pago/{pagare}', 'PagareController@createPago')->name('supervisor.pagare.pago.create');
Route::post('pagare/pago', 'PagareController@storePago')->name('supervisor.pagare.pago.store');

Route::put('pagare/validar/{pagare}', 'PagareController@updateEstado')->name('supervisor.pagare.estado.update');

Route::get('configuracion', 'ConfiguracionController@index')->name('supervisor.configuracion.index');
Route::post('configuracion', 'ConfiguracionController@cambiarPassword')->name('supervisor.configuracion.cambiarPassword');

Route::post('index/buscar/peticion', 'InicioController@peticion_ajax')->name('supervisor.buscar.peticion');


Route::get('pagare/{pagare}/observacion', 'PagareController@observacion')->name('supervisor.pagare.observacion');
Route::post('pagare/observacion/create', 'PagareController@observacionStore')->name('supervisor.pagare.observacion.store');
Route::get('pagare/{pagare}/observaciones', 'PagareController@observacionMostrar')->name('supervisor.pagare.observacionMostrar');
