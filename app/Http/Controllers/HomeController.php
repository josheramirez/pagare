<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cuota;
use App\Deuda;
use Carbon\Carbon;
use App\Log;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol_id === 1){


            return redirect()->route('administrador.users.index');

        }elseif (Auth::user()->rol_id === 2) {

            return redirect()->route('digitador.index');
        }else{
            
            return redirect()->route('supervisor.index');
        }
    }


    public function prueba(Request $request)
    {

        //return dd($request->all());
        // DEUDA VACIA SIN CUOTAS CREADAS

//EVITO COPIAS DE CUOTAS (REEENVIO DE FORMULARIO)
$cuotas_creadas=Cuota::where('deuda_id',$request->deuda_id)->where('n_cuota','!=','0')->count();
if($cuotas_creadas!=0){
    //redirecciono a pagare view 
    if (Auth::user()->rol_id === 2){
        return redirect()->route('digitador.pagare.view', [$request->pagare]);
        //return view('digitador.pagares.deudor_deuda.edit_deuda', compact('deuda'));
    }else{
        return redirect()->route('supervisor.pagare.view', [$request->pagare]);
        //return view('supervisor.pagares.deudor_deuda.edit_deuda', compact('deuda'));
    }

}


        if ($request->cuotas=="sin_crear") {
        // COMO NO HAY FECHA DE VENCIMIENTO ESTABLECIDA, IMPLICA QUE NO HAY CUOTAS ASIGNADAS PROCEDO A CREAR CUOTAS EN BASE A DATOS INSERTADOS
            

           for ($i=0; $i < $request->n_cuota; $i++) {
                $n_cuota=$i+1;
                $monto=$request->valor_cuota;

        // ERROR asignacion de id deuda
        //$deuda_id=$request->pagare;

        $deuda_id=$request->deuda_id;

                // ESTADO 0=POR PAGAR
                // ESTADO 1=PAGADO
                // ESTADO 2=CUOTA ANULADA

                // FECHA SELECCIONADA EN INPUT Fecha Pago 1° Cuota ESTABLECE EL PUNTO DE PARTIDAD DE LOS PAGOS, DESDE ESA FECHA CALCULO LAS SIGUIENTES FECHAS DE PAGO DE LAS CUOTAS SIGUIENTES

                $f_vencimiento= Carbon::parse($request->f_vencimiento)->addMonth($i);

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
            
            $creacion_cuota="cuotas_creadas";


            

            // EDITO EL VALOR DE LA DEUDA
            $deuda = Deuda::find($request->deuda_id);
            $deuda->total = $request->total;
            $deuda->n_cuota = $request->n_cuota;
            $deuda->valor_cuota=$request->valor_cuota;
            // tomar la fecha de la ultima cuota 
            $deuda->vencimiento=$f_vencimiento;
            $deuda->save();



    // DEUDA CREADA , MODO VISUALIZACION (NO SE PUEDE EDITAR YA QUE DEPENDEN CUOTAS DE ESTA DEUDA)
        }else{
        // HAY FECHA DE VENCIMIENTO ESTABLECIDA POR LO TANTO LAS CUOTAS ESTAN ASIGNADAS PROCEDO SOLO A EDITAR LA DEUDA Y CUOTAS
            //return dd("estan creadas");
            $deuda = Deuda::find($request->pagare);
            $creacion_cuota="deuda_editada";
        }

 




    $cuotas_sin_deuda=Cuota::where('deuda_id',$request->deuda_id)->where('estado','abono')->get();
    $monto_abonos=0;
    $boleta_abono=null;
    $bandera="";




// SOLO SI HAY CUOTAS SIN DEUDAS VOY LENANDO CUOTAS CREADAS (SOLO PARA UN ABONO)
    if ($cuotas_sin_deuda->count()!=0) {
        


        foreach ($cuotas_sin_deuda as $cuota) {
            $monto_abonos=$monto_abonos+$cuota->monto;
            if ($boleta_abono==null) {
                $boleta_abono=$cuota->n_boleta;
            }else{
                $boleta_abono=$boleta_abono.'-'.$cuota->n_boleta;
            }
        }

  

        $request['f_pago'] = Carbon::now()->format('Y-m-d');
        $monto_variable=$monto_abonos;
        $cuota = Cuota::where('deuda_id',$request->deuda_id)->where('estado',"pendiente")->first();
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
                    $cuota->f_pago=$request->f_pago;
                    $monto_variable=($monto_variable)-($cuota->monto);

                    $cuota->save();
                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO CUOTA');
                    $cuota = Cuota::where('deuda_id',$request->deuda_id)->where('estado',"pendiente")->first();
                }
                else{

                    $cuota->monto_pagado=$monto_variable;
                    if($cuota->n_boleta==null){
                        $cuota->n_boleta=$boleta_abono;
                    }else{
                        $cuota->n_boleta=$cuota->n_boleta."-".$boleta_abono;
                    }
                    $cuota->f_pago=$request->f_pago;
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
                    $cuota->f_pago=$request->f_pago;
                    $cuota->save();
                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO CUOTA');
                    $cuota = Cuota::where('deuda_id',$request->deuda_id)->where('estado',"pendiente")->first();

                }

                else{
                    $cuota->monto_pagado= $cuota->monto_pagado+$monto_variable;
                    if($cuota->n_boleta==null){
                        $cuota->n_boleta=$boleta_abono;
                    }else{
                        $cuota->n_boleta=$cuota->n_boleta."-".$boleta_abono;
                    }
                    $cuota->f_pago=$request->f_pago;
                    $cuota->save();
                    $monto_variable=0;
                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO CUOTA');
                }
            }

        }
    }

// VUELTO



//return dd($request->all(),$cuotas_sin_deuda,$monto_abonos,$request->f_pago,$monto_variable,$cuota, $cuota->f_pago, $monto_variable);


//return dd($request->all(),$creacion_cuota,$deuda,$cuotas_sin_deuda->count(), $bandera, $monto_abonos);




    // SELECCIONO VISTA SEGUN ROL
    if (Auth::user()->rol_id === 2){
        return redirect()->route('digitador.pagare.view', [$request->pagare]);
        //return view('digitador.pagares.deudor_deuda.edit_deuda', compact('deuda'));
    }else{
        return redirect()->route('supervisor.pagare.view', [$request->pagare]);
        //return view('supervisor.pagares.deudor_deuda.edit_deuda', compact('deuda'));
    }

             //return view('supervisor.pagares.deudor_deuda.edit_deuda', compact('deuda'));

            //         //creo la deuda

            //         // DB::insert('insert into student (name) values(?)',[$name]);

            // $deuda = Deuda::find($request->pagare);
            // $deuda->total = $request->total;
            // $deuda->n_cuota = $request->n_cuota;
            // $deuda->valor_cuota=$request->valor_cuota;



            // // tomar la fecha de la ultima cuota 
            // $deuda->vencimiento=$f_vencimiento;

            // $deuda->save();


            //  $f_vencimiento= Carbon::parse($request->f_vencimiento)->addMonth(0);



             //       for ($i=0; $i < $request->n_cuota; $i++) {


             // n_cuota monto   f_pago  detalle n_boleta    deuda_id    created_at  updated_at  estado  f_vencimiento
             //            $n_cuota = $request->input('stud_name');
                        
             //            $n_cuota=$i+1;
             //            $monto=$request->valor_cuota;
             //            $deuda_id=$request->deuda_id;

             //            // ESTADO 0=POR PAGAR
             //            // ESTADO 1=PAGADO
             //            // ESTADO 2=CUOTA ANULADA

             //            $estado=0;
             //            $f_vencimiento=


             //            DB::insert('insert into student (name) values(?)',[$name]);
             //       } 


                  // return dd($request->all(),$f_vencimiento->format('Y-m-d'),$deuda->pagare->id);


                // $user = User::create($input);


                // return $user->id;



    }
}
