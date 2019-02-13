<?php

namespace App\Http\Controllers\Supervisor;

use App\Codeudor;
use App\Cuota;
use App\Deuda;
use App\Deudor;
use App\Direccion;
use App\Http\Requests\CrearMandatoRequest;
use App\Http\Requests\CrearPagareRequest;
use App\Http\Requests\CrearPagoRequest;
use App\Http\Requests\EditarCodeudorRequest;
use App\Http\Requests\EditarDeudaRequest;
use App\Http\Requests\EditarDeudorRequest;
use App\Http\Requests\EditarPacienteRequest;
use App\Http\Requests\SupervisorCrearPagareRequest;
use App\Http\Requests\SupervisorEditarDeudaRequest;
use App\Log;
use App\Mandato;
use App\Paciente;
use App\Pagare;
use App\Prevision;
use App\Servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use NumberToWords\NumberToWords;
use PhpParser\Node\Stmt\DeclareDeclare;
use App\Observacion;

use DB;

//agregado nuevo modelo
use App\Modalidad;

class PagareController extends Controller
{
    public function createDeudorDeuda()
    {
        return view('supervisor.pagares.deudor_deuda.create');
    }

    public function storeDeudorDeuda(SupervisorCrearPagareRequest $request)
    {

        //Creamos direccion del duedor
        $direcion = Direccion::create($request->all());

        //Creamos al deudor
        $request['direccion_id'] = $direcion->id;
        $deudor = Deudor::create($request->all());

        //Creamos la deuda
        $deuda = Deuda::create($request->all());

        //Creamos el paciente
        $paciente = New Paciente;
        $paciente->save();

        //Creamos al codeudor y direccion
        $direccion_co = New Direccion;
        $direccion_co->save();

        $codeudor = New Codeudor;
        $codeudor->direccion_id = $direccion_co->id;
        $codeudor->save();

        //Creamos el pagare
        $request['deudor_id'] = $deudor->id;
        $request['deuda_id'] = $deuda->id;
        $request['user_id'] = Auth::user()->id;
        //$request['numero'] = Pagare::numeroPagare();
        $request['codigo'] = Pagare::codigoPagare();
        $request['estado_id'] = 1;
        $request['paciente_id'] = $paciente->id;
        $request['codeudor_id'] = $codeudor->id;

// atributo motivo vacio por defecto al crear nuevo registro 
        $request['motivo']="";
        
        $pagare = Pagare::create($request->all());

        //return redirect()->route('pagare.paciente.create', [$pagare->id]);

        $log = Log::saveLog($pagare->codigo, 'NUEVO PAGARE');

        return redirect()->route('supervisor.pagare.view', [$deudor->pagare->id]);
    }

    public function editDeudor(Deudor $deudor){

        return view('supervisor.pagares.deudor_deuda.edit_deudor', compact('deudor'));
    }

    public function updateDeudor(EditarDeudorRequest $request, Deudor $deudor){

        $direccion = Direccion::findOrFail($deudor->direccion_id);

        $deudor->fill($request->all());
        $deudor->save();

        $direccion->fill($request->all());
        $direccion->save();

        $log = Log::saveLog($deudor->pagare->codigo, 'MODIFICACION DEUDOR');

        return redirect()->route('supervisor.pagare.view', [$deudor->pagare->id]);
    }

    public function copiarDeudor(Pagare $pagare){

        $deudor = Deudor::findOrFail($pagare->deudor->id);
        $paciente = Paciente::findOrFail($pagare->paciente->id);

        $paciente->nombre = $deudor->nombre;
        $paciente->paterno = $deudor->paterno;
        $paciente->materno = $deudor->materno;
        $paciente->rut = formatoRut($deudor->rut) ;
        $paciente->pasaporte= $deudor->pasaporte;
        $paciente->save();


        return redirect()->route('supervisor.pagare.paciente.edit', [$pagare->paciente_id]);
    }

    public function editPaciente(Paciente $paciente)
    {   
        $modalidad = Modalidad::where('activo', 1)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
        $previsiones = Prevision::where('activo', 1)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
        $servicios = Servicio::where('activo', 1)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
        return view('supervisor.pagares.paciente.edit', compact('paciente', 'previsiones', 'modalidad','servicios'));
    }

    public function updatePaciente(EditarPacienteRequest $request, Paciente $paciente){
        
        //$paciente->modalidad_id=request('modalidad_id');
        
        $paciente->fill($request->all());

//return $paciente;
        $paciente->save();

        $log = Log::saveLog($paciente->pagare->codigo, 'MODIFICACION PACIENTE');

        return redirect()->route('supervisor.pagare.view', [$paciente->pagare->id]);
    }

    public function editCodeudor(Codeudor $codeudor){

        return view('supervisor.pagares.codeudor.edit', compact('codeudor'));
    }

    public function updateCodeudor(EditarCodeudorRequest $request, Codeudor $codeudor){
        $direccion = Direccion::findOrFail($codeudor->direccion_id);

        $codeudor->fill($request->all());
        $codeudor->save();

        $direccion->fill($request->all());
        $direccion->save();

        $log = Log::saveLog($codeudor->pagare->codigo, 'MODIFICACION CODEUDOR');

        return redirect()->route('supervisor.pagare.view', [$codeudor->pagare->id]);
    }

// se le pasa variable $pagare->deuda_id desde finanzas.blase.php
    public function editDeuda(Deuda $deuda){
        //if ($deuda->pagare->estado_id == 1){
            return view('supervisor.pagares.deudor_deuda.edit_deuda', compact('deuda'));
        //}else{
            //abort('403');
        //}
    }


// AQUI EDITO LA DEUDA
    public function updateDeuda(SupervisorEditarDeudaRequest $request, Deuda $deuda){
        $deuda->fill($request->all());
        $deuda->save();

        $log = Log::saveLog($deuda->pagare->codigo, 'MODIFICACION DEUDA');

        return redirect()->route('supervisor.pagare.view', [$deuda->pagare->id]);
    }

    public function createMandato(Pagare $pagare)
    {
        //if ($pagare->estado_id == 1){
            return view('supervisor.pagares.mandato.create', compact('pagare'));
        //}else{
            //abort('403');
        //}
    }

    public function storeMandato(CrearMandatoRequest $request)
    {
        $mandato = Mandato::create($request->all());

        $pagare = Pagare::findOrFail($request->pagare_id);
        $pagare->mandato_id = $mandato->id;
        $pagare->save();

        $log = Log::saveLog($pagare->codigo, 'NUEVO MANDATO');

        return redirect()->route('supervisor.pagare.view', [$pagare->id]);
    }

    public function editMandato(Mandato $mandato){
        return view('supervisor.pagares.mandato.edit', compact('mandato'));
    }

    public function updateMandato(CrearMandatoRequest $request, Mandato $mandato){
        $mandato->fill($request->all());
        $mandato->save();

        $log = Log::saveLog($mandato->pagare->codigo, 'MODIFICACION MANDATO');

        return redirect()->route('supervisor.pagare.view', [$mandato->pagare->id]);
    }

    public function createPago(Pagare $pagare)
    {   


//CARGO LA ULTIMA CUOTA POR PAGAR

        $total_pagado=Cuota::where('deuda_id',$pagare->deuda->id)->where('monto',"!=",'monto_pagado')->sum('monto_pagado');

        // traigo las cuotas pendientes
        $ultima_cuota = Cuota::where('deuda_id',$pagare->deuda->id)->where('estado',"pendiente")->get();
        $cuotas_todas = Cuota::where('deuda_id',$pagare->deuda->id)->get();

        // desde esta cuota empiezo a llenar
        $numero_cuota=$ultima_cuota->first();
        $cantidad_cuotas=$cuotas_todas->count();
        //return dd($numero_cuota,$total_pagado,$cuotas_todas->count());

        $pagare_id=$pagare->deuda->id;

        if ($pagare->estado_id == 2){
            return view('supervisor.pagares.pago.create', compact('pagare', 'numero_cuota','pagare_id','total_pagado','cantidad_cuotas'));
        }else{
            abort('403');
        }




//CODEIGO ANTERIOR
        // $numero_cuota = Cuota::where('deuda_id',$pagare->deuda->id)->count();
        // $numero_cuota = $numero_cuota + 1;


        // $pagare_id=$pagare->deuda->id;
        // if ($pagare->estado_id == 2){
        //     return view('supervisor.pagares.pago.create', compact('pagare', 'numero_cuota','pagare_id'));
        // }else{
        //     abort('403');
        // }
    }

    public function storePago(CrearPagoRequest $request)
    {
        
        $request['f_pago'] = Carbon::parse($request['f_pago'])->format('Y-m-d');


        if ($request->cuota_id==0) {
                //SE CREA LA CUOTA, sin deuda relacionada, tipo abono 
                $cuota=Cuota::create([
                    'n_cuota'       =>   0, 
                    'monto'         =>   $request->monto,
                    'monto_pagado'  =>   0,
                    'deuda_id'      =>   $request->deuda_id,
                    'estado'        =>   "abono",
                    'n_boleta'      =>   $request->n_boleta,
                    'f_vencimiento' =>   null,
                    'f_pago'        =>   $request->f_pago
                ]);  
        return redirect()->route('supervisor.pagare.view', [$request->pagare_id]);
        }

        
        $monto_variable=$request->monto;
        $cuota_id=$request->cuota_id;
        $vuelto=0;

    
        //return dd($cuota_id);
        $cuota= Cuota::where('id',$cuota_id )->first();


 //return dd($request->all(),$cuota,$monto_variable);  

        while($monto_variable>0){

             // si entro aqui es por q no hay mas cuotas por llenar, SALIDA DEL WHILE
            if($cuota==null){
                $vuelto=$monto_variable;
                $monto_variable=0;
                continue;
            }
            // cuota sin abono previo (cuota vacia), AQUI N_BOLETA ES NULL
            if($cuota->monto_pagado==0){
 
                // si el monto a pagar es mayor a la cuota
                if($monto_variable>=$cuota->monto){

                    $cuota->monto_pagado=$cuota->monto;
                    $cuota->estado="pagado";
                    $cuota->n_boleta=$request->n_boleta;
                    $cuota->f_pago=$request->f_pago;
                    $monto_variable=($monto_variable)-($cuota->monto);
                    $cuota->save();
                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO');
                    // eligo la proxima cuota
                    $cuota = Cuota::where('deuda_id',$request->deuda_id)->where('estado',"pendiente")->first();
                }
                //  si el monto a pagar es menor a la cuota (ABONO)
                else{

                    //FALTA AQUI IMPLEMENTAR LO DEL MODELO ABONO PARA EVITAR DOBLE ASIGNACION DE N_BOLETA EN CASO DE LOS PAGOS DE ABONO n_bono/n_boleta

                    $cuota->monto_pagado=$monto_variable;
                    
                    // si en n_boleta hay un null, concadeno con nuevo n_boleta
                    if($cuota->n_boleta==null){
                        $cuota->n_boleta=$request->n_boleta;
                    }else{
                        $cuota->n_boleta=$cuota->n_boleta."-".$request->n_boleta;
                    }
                    
                    $cuota->f_pago=$request->f_pago;
                    $monto_variable=0;
                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO');
                    $cuota->save();
                    

                }
                
            }
            // cuota con abono previo (cuota con datos) AQUI YA TIENE UN MONTO_PAGADO Y N_BOLETA
            else{
                $diferencia_cuota=$cuota->monto-$cuota->monto_pagado;

                // si el monto a pagar es mayor al valor maximo de la cuota
                if($monto_variable>=$diferencia_cuota){
                    $monto_variable=$monto_variable-$diferencia_cuota;
                    $cuota->monto_pagado=$cuota->monto_pagado+$diferencia_cuota;
                    $cuota->estado="pagado";

                     if($cuota->n_boleta==null){
                        $cuota->n_boleta=$request->n_boleta;
                    }else{
                        $cuota->n_boleta=$cuota->n_boleta."-".$request->n_boleta;
                    }
                    $cuota->f_pago=$request->f_pago;
                    $cuota->save();
                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO');
                    // eligo la proxima cuota
                    $cuota = Cuota::where('deuda_id',$request->deuda_id)->where('estado',"pendiente")->first();
                    //return dd($request->all(),$cuota); 

                }
                //  si el monto a pagar es menor a la cuota (ABONO)
                else{

                    //FALTA AQUI IMPLEMENTAR LO DEL MODELO ABONO PARA EVITAR DOBLE ASIGNACION DE N_BOLETA EN CASO DE LOS PAGOS DE ABONO n_bono/n_boleta

                    $cuota->monto_pagado= $cuota->monto_pagado+$monto_variable;

                    // si en n_boleta hay un null, concadeno con nuevo n_boleta
                    if($cuota->n_boleta==null){
                        $cuota->n_boleta=$request->n_boleta;
                    }else{
                        $cuota->n_boleta=$cuota->n_boleta."-".$request->n_boleta;
                    }

                    $cuota->f_pago=$request->f_pago;
                    $cuota->save();

                    $monto_variable=0;
                    $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO');


                }
            }

        }

        //return dd($request->all(),"cuotas llenadas",$vuelto);

        //$cuota = Cuota::find($request->deuda_id);

    

        return redirect()->route('supervisor.pagare.view', [$request->pagare_id]);



//CODiGO ANTERIOR
        // $request['f_pago'] = Carbon::parse($request['f_pago'])->format('Y-m-d');
        
        // $cuota = Cuota::create($request->all());

        // $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO');

        // return redirect()->route('supervisor.pagare.view', [$cuota->deuda->pagare->id]);
    }

    public function updateEstado(Pagare $pagare)
    {
        $pagare->fecha = Carbon::now();
        $pagare->estado_id = 2;
        $pagare->numeracion = Pagare::numeroPagare();
        $pagare->save();

        $log = Log::saveLog($pagare->codigo, 'VALIDACION PAGARE');

        return redirect()->route('supervisor.pagare.view', [$pagare->id]);
    }

    public function updateEstadoAnular(Pagare $pagare)
    {
        //imprime dato y caracteristicas
        //var_dump(request('invisible'));
        //guardo lo que envio desde form en la variable dato, invisible es el nombre de la variable q envio

        $dato=request('motivo');

$autor=request('motivo_autor');
$fecha=Carbon::now();

//return dd($dato,$autor,$fecha);

        $pagare->motivo=$dato;
        $pagare->estado_id = 3;
        $pagare->motivo_autor=$autor;
        $pagare->motivo_fecha=$fecha;
        $pagare->save();
        $log = Log::saveLog($pagare->codigo, 'ANULAR PAGARE ');
        return redirect()->route('supervisor.pagare.view', [$pagare->id]);
    }

public function updateEstadoJudicial(Pagare $pagare)
{

        return dd($pagare);
}


  
/* ANTIGUO METODO ANULAR
    public function updateEstadoAnular(Pagare $pagare)
    {
        $pagare->estado_id = 3;
        $pagare->save();
        $log = Log::saveLog($pagare->codigo, 'ANULAR PAGARE');
        return redirect()->route('supervisor.pagare.view', [$pagare->id]);
    }
*/

    public function view(Pagare $pagare)
    {

// cantidad de cuotas generadas
        //$numero_pagos = DB::select('select count(*) from cuotas where deuda_id = ? AND (estado=? OR estado=?)', [$pagare->deuda_id,"pendiente","pagado"]);
        //$numero_pagos = Cuota::where('deuda_id', $pagare->deuda_id)->where('estado','pagado')->orWhere('estado','pendiente')->count();
    $numero_pagos=Cuota::where('deuda_id',$pagare->deuda_id)
      ->where(function($q) {
          $q->where('estado', "pendiente")
            ->orWhere('estado',"pagado");
      })
      ->count();


        // traigo todas las cuotas
        $pagos = Cuota::where('deuda_id', $pagare->deuda_id)->get();

        // ultima cuota pagada
        $ultimo_pago = $pagos->where('estado','pagado')->last();

        // cantidad cuotas pagadas
        $cuotas_pagadas=$pagos->where('estado','pagado')->count();

        $observaciones = Observacion::where('pagare_id',$pagare->id)->get();

        $pago_sin_deuda=  Cuota::where('deuda_id', $pagare->deuda_id)->where('estado','abono')->count();

        $abonos=Cuota::where('deuda_id', $pagare->deuda_id)->where('estado','abono')->get();


$pagos_antiguos=Cuota::where('deuda_id', $pagare->deuda_id)->where('estado','')->get();

foreach ($pagos_antiguos as $pago) {
    
}



        //return dd($numero_pagos,$pagos->all(),$ultimo_pago,$pago_sin_deuda, $numero_pagos);

        return view('supervisor.pagares.view', compact('pagare', 'ultimo_pago', 'numero_pagos', 'pagos','cuotas_pagadas','observaciones','pago_sin_deuda','abonos','pagos_antiguos'));

     
// CODIGO AMTIGUO
        // $numero_pagos = Cuota::where('deuda_id', $pagare->deuda_id)->count();

        // $pagos = Cuota::where('deuda_id', $pagare->deuda_id)->get();

        // $ultimo_pago = $pagos->last();

        // return view('supervisor.pagares.view', compact('pagare', 'ultimo_pago', 'numero_pagos', 'pagos'));
    }

    public function print(Pagare $pagare)
    {
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('es');
        $pagare['valor_total'] = $pagare->deuda->total;
        $pagare['valor_total'] = $numberTransformer->toWords($pagare->valor_total);
        $pagare['valor_nuevo']=$pagare->paciente->vas;

        return view('supervisor.pagares.print', compact('pagare'));

//        return dd($pagare, $pagare->deuda->n_cuota);
    }

    public function observacion(Pagare $pagare)
    {
         return view('supervisor.pagares.observaciones.create', compact('pagare'));
    }

    public function observacionStore(Request $request)
    {
        Observacion::create(['observacion' => $request->observacion, 'pagare_id' => $request->pagare_id,'user_id' => Auth::user()->id]);
        return redirect()->route('supervisor.pagare.view', [$request->pagare_id]);
        //return dd($request->all(),Auth::user()->id,Auth::user()->full_nombre);
    }

    public function observacionMostrar(Request $request)
    {
        $pagos = Cuota::where('deuda_id', $pagare->deuda_id)->get();

        $observaciones=Observacion::where('pagare_id', $request->pagare_id)->get();

        return redirect()->route('supervisor.pagare.view', $observaciones);
        //return dd($request->all(),Auth::user()->id,Auth::user()->full_nombre);
    }

}
