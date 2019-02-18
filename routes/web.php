<?php
use App\Cuota;
use App\Deuda;
use Carbon\Carbon;
use App\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pruebaton', 'HomeController@prueba')->name('prueba');


// Route::get('/prueba', function () {
    
// 	return dd("hola");
// });


//Route::get('/listar_cuotas/{id}', 'Reportes@listar_cuotas')->name('reporte.listar');

Route::get('reporte', function(){
	        $lista_pagares = DB::table('pagares')
	        ->join('pacientes', 'pagares.paciente_id', '=', 'pacientes.id')
	        ->join('deudores', 'pagares.deudor_id', '=', 'deudores.id')
	        ->join('direcciones', 'deudores.direccion_id', '=', 'direcciones.id')
	        ->leftJoin('previsiones', 'pacientes.prevision_id', '=', 'previsiones.id')
	        ->join('deudas', 'pagares.deuda_id', '=', 'deudas.id')
	        ->select(	'pagares.codigo', 'pagares.fecha','deudores.full_nombre AS deudor_nombre','deudores.rut',
	        			'direcciones.calle','direcciones.numero','direcciones.poblacion',
	        			'direcciones.comuna','direcciones.fono','pacientes.full_nombre AS paciente_nombre', 
	        			'pacientes.rut AS paciente_rut', 'previsiones.nombre AS prevision', 'pagares.fecha',
	        			'deudas.total', 'deudas.n_cuota', 'deudas.valor_cuota', 'deudas.vencimiento', 'deudas.saldo','deudas.id')
            ->get();

foreach ($lista_pagares as $i => $value) {
	$lista_pagares[$i]->dv=Rut::set($lista_pagares[$i]->rut)->calculateVerificationNumber();
	$lista_pagares[$i]->paciente_dv=Rut::set($lista_pagares[$i]->paciente_rut)->calculateVerificationNumber();
}


     //return dd($lista_pagares);
     return view('reporte', compact('lista_pagares'));
});



Route::get('reportes', function(){

	
	        $lista_pagares = DB::table('pagares')
	        ->join('pacientes', 'pagares.paciente_id', '=', 'pacientes.id')
	        ->join('deudores', 'pagares.deudor_id', '=', 'deudores.id')
	        ->join('direcciones', 'deudores.direccion_id', '=', 'direcciones.id')
	        ->leftJoin('previsiones', 'pacientes.prevision_id', '=', 'previsiones.id')
	        ->join('deudas', 'pagares.deuda_id', '=', 'deudas.id')
	        ->select(	'pagares.estado_id','pagares.numeracion', 'pagares.fecha','pagares.judicial','deudores.full_nombre AS deudor_nombre','deudores.rut',
	        			'direcciones.calle','direcciones.numero','direcciones.poblacion',
	        			'direcciones.comuna','direcciones.fono','pacientes.full_nombre AS paciente_nombre', 
	        			'pacientes.rut AS paciente_rut', 'previsiones.nombre AS prevision', 'pagares.fecha',
	        			'deudas.total', 'deudas.n_cuota', 'deudas.valor_cuota', 'deudas.vencimiento', 'deudas.saldo','deudas.id')
            ->get();

foreach ($lista_pagares as $i => $value) {
	$lista_pagares[$i]->dv=Rut::set($lista_pagares[$i]->rut)->calculateVerificationNumber();
	$lista_pagares[$i]->paciente_dv=Rut::set($lista_pagares[$i]->paciente_rut)->calculateVerificationNumber();
}


     //return dd($lista_pagares);
	
     return view('prueba', compact('lista_pagares'));
});





Route::get('pago_antiguo', function(){


// PRUEBA ASIGNACION DE FECHAS
	// $deuda_antigua=Deuda::where("id",81)->first();
	// $cadena=null;

	// for ($i=0; $i<$deuda_antigua->n_cuota ; $i++) { 
	// 	if($cadena==null){$cadena=Carbon::parse($deuda_antigua->created_at)->addMonth($i);}
	// 	else{$cadena=$cadena."-".Carbon::parse($deuda_antigua->created_at)->addMonth($i)->format('Y-m-d');}
	// }
	// return dd($cadena);
// FIN PRUEBA ASIGNACION DE FECHAS


// PROCEDIMIENTO 1, asigno como abono las cuotas sin deudas

	$cuota_antigua=Cuota::where('estado','')->get();

	foreach ($cuota_antigua as $pago) {

	    $deuda_antigua=Deuda::where("id",$pago->deuda_id)->first();

	    if($deuda_antigua->total!=null){
	    	// $pago->monto_pagado=$pago->monto;
	    	// if($deuda_antigua->total>$pago->monto){
	    	// 	//ES ABONO DEUDA > PAGO	
	    	// 	$pago->estado='pendiente';
	    	// }else{
	    	// 	//ES PAGO TOTAL
	    	// 	$pago->estado='pagado';
	    	// }
	    }else{
	    	$pago->estado='abono';
	    	$pago->n_cuota=0;
	    }
	    $pago->save();
	}
// return dd($cuota_antigua);




// PROCEDIMIENTO 2, RECORRO DEUDAS DEUDAS CON CUOTAS EN SISTEMA ANTIGO SON CREADAS EN SISTEMA  NUEVO , SE ASIGNA ESTADO=ANTIGUO , SE LLENAN LAS NUEVAS CUOTAS CREADAS 

	$deuda_antigua=Deuda::all();
	$array_deudas=array();

	foreach ($deuda_antigua as $deuda) {	
		$cuotas_antiguas=Cuota::where('deuda_id',$deuda->id)->get();
		$total_antiguas=$cuotas_antiguas->count();

		if($total_antiguas>0){
			// PUEDE QUE HAYA 1 CUOTA O TODAS, REVISO QUE EL N_CUOTAS DE DEUDA SEA IGUAL A LA CANTIDAD DE CUOTAS CREADAS EN DEUDAS
			$monto_suma=$cuotas_antiguas->sum('monto');

			// catalogo las cuotas como sistema antigo
			
			Cuota::where('deuda_id',$deuda->id)->where('estado','!=','abono')->update(['estado' => "antiguo"]);
			
			// creo las nuevas cuotas en funcion a la deuda creada
			for ($i=0; $i < $deuda->n_cuota; $i++) { 
				       
	                $n_cuota=$i+1;
	                $monto=$deuda->valor_cuota;
	       			$deuda_id=$deuda->id;

	                // ESTADO 0=POR PAGAR
	                // ESTADO 1=PAGADO
	                // ESTADO 2=CUOTA ANULADA

	                $f_vencimiento= Carbon::parse($deuda->created_at)->addMonth($i+1)->format('Y-m-d');

	                //SE CREA LA CUOTA

					Cuota::create([
					    'n_cuota'       =>   $n_cuota, 
					    'monto'         =>   $monto,
					    'deuda_id'      =>   $deuda_id,
					    'f_pago'        =>   null,
					    'n_boleta'      =>   null,
					    'estado'        =>   'pendiente',
					    'monto_pagado'  =>   null,
					    'f_vencimiento' =>   $f_vencimiento
					]);  

			}

			// lleno las cuotas nuevas
			$monto_abonos=0;
			$boleta_abono=null;

	        foreach ($cuotas_antiguas as $cuota) {
	            $monto_abonos=$monto_abonos+$cuota->monto;
	            if ($boleta_abono==null) {
	                $boleta_abono=$cuota->n_boleta;
	            }else{
	                $boleta_abono=$boleta_abono.'-'.$cuota->n_boleta;
	            }
	        }

	 		
	        $deuda['f_pago'] = Carbon::now()->format('Y-m-d');
	        $monto_variable=$monto_abonos;
	        $cuota = Cuota::where('deuda_id',$deuda->id)->where('estado',"pendiente")->first();
	        $vuelto=0;

			

	        while($monto_variable>0){
	            if($cuota==null){
	                $vuelto=$monto_variable;
	                $monto_variable=0;
	                continue;
	            }
	            if($cuota->monto_pagado==0){
	                if($monto_variable>=$cuota->monto){
	                    $cuota->monto_pagado=$cuota->monto;
	                    $cuota->estado="pagado";
	                    // 
	                    $cuota->n_boleta=$boleta_abono;
	                    $cuota->f_pago=$deuda->f_pago;
	                    $monto_variable=($monto_variable)-($cuota->monto);

	                    $cuota->save();
	                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO CUOTA');
	                    $cuota = Cuota::where('deuda_id',$deuda->deuda_id)->where('estado',"pendiente")->first();
	                }
	                else{

	                    $cuota->monto_pagado=$monto_variable;
	                    if($cuota->n_boleta==null){
	                        $cuota->n_boleta=$boleta_abono;
	                    }else{
	                        $cuota->n_boleta=$cuota->n_boleta."-".$boleta_abono;
	                    }
	                    $cuota->f_pago=$deuda->f_pago;
	                    $monto_variable=0;
	                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO CUOTA');
	                    $cuota->save();
	                }
	                
	            }
	            else{
	                $diferencia_cuota=$cuota->monto-$cuota->monto_pagado;
	                if($monto_variable>=$diferencia_cuota){
	                    $monto_variable=$monto_variable-$diferencia_cuota;
	                    $cuota->monto_pagado=$cuota->monto_pagado+$diferencia_cuota;
	                    $cuota->estado="pagado";

	                     if($cuota->n_boleta==null){
	                        $cuota->n_boleta=$boleta_abono;
	                    }else{
	                        $cuota->n_boleta=$cuota->n_boleta."-".$boleta_abono;
	                    }
	                    $cuota->f_pago=$deuda->f_pago;
	                    $cuota->save();
	                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO CUOTA');
	                    $cuota = Cuota::where('deuda_id',$deuda->deuda_id)->where('estado',"pendiente")->first();

	                }

	                else{
	                    $cuota->monto_pagado= $cuota->monto_pagado+$monto_variable;
	                    if($cuota->n_boleta==null){
	                        $cuota->n_boleta=$boleta_abono;
	                    }else{
	                        $cuota->n_boleta=$cuota->n_boleta."-".$boleta_abono;
	                    }
	                    $cuota->f_pago=$deuda->f_pago;
	                    $cuota->save();
	                    $monto_variable=0;
	                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO CUOTA');
	                }
	            }


	        }


		}else{

			// CREO LAS CUOTAS DE AQUELLAS DEUDAS Q NO TIENEN CUOTAS
			for ($i=0; $i < $deuda->n_cuota; $i++) { 
				       
	                $n_cuota=$i+1;
	                $monto=$deuda->valor_cuota;
	       			$deuda_id=$deuda->id;

	                // ESTADO 0=POR PAGAR
	                // ESTADO 1=PAGADO
	                // ESTADO 2=CUOTA ANULADA

	                $f_vencimiento= Carbon::parse($deuda->created_at)->addMonth($i+1)->format('Y-m-d');

	                //SE CREA LA CUOTA
	                Cuota::create([
	                    'n_cuota'       =>   $n_cuota, 
	                    'monto'         =>   $monto,
	                    'deuda_id'      =>   $deuda_id,
	                    'f_pago'        =>   null,
	                    'n_boleta'      =>   null,
	                    'estado'        =>   'pendiente',
	                    'monto_pagado'  =>   null,
	                    'f_vencimiento' =>   $f_vencimiento
	                ]);  
	           
			}

			$array_deudas[]=$deuda->id;
		}

	}




	return dd($monto_abonos,$boleta_abono,$cuotas_antiguas->count(),$cuota);      

// FIN PROCEDIMIENTO 2
});





// SELECT pagares.codigo, deudores.full_nombre as Deudor_Nombre, deudores.rut as Deudor_rut, direcciones.calle, direcciones.numero, 
// direcciones.poblacion, direcciones.comuna, direcciones.fono, pacientes.full_nombre as Paciente_Nombre, pacientes.rut as Paciente_Rut, previsiones.nombre,
// pagares.fecha, deudas.total, deudas.n_cuota, deudas.valor_cuota, deudas.vencimiento, deudas.saldo
// FROM `pagares` 
// INNER JOIN pacientes ON pagares.paciente_id=pacientes.id
// INNER JOIN deudores ON pagares.deudor_id=deudores.id
// INNER JOIN direcciones ON deudores.direccion_id=direcciones.id
// LEFT JOIN previsiones ON pacientes.prevision_id=previsiones.id
// INNER JOIN deudas ON pagares.deuda_id=deudas.id
// where 1