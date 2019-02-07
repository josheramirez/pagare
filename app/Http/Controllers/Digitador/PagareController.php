<?php

namespace App\Http\Controllers\Digitador;

use App\Codeudor;
use App\Cuota;
use App\Deuda;
use App\Deudor;
use App\Direccion;
use App\Http\Requests\CrearCodeudorRequest;
use App\Http\Requests\CrearMandatoRequest;
use App\Http\Requests\CrearPacienteRequest;
use App\Http\Requests\CrearPagareRequest;
use App\Http\Requests\CrearPagoRequest;
use App\Http\Requests\EditarCodeudorRequest;
use App\Http\Requests\EditarDeudaRequest;
use App\Http\Requests\EditarDeudorRequest;
use App\Http\Requests\EditarPacienteRequest;
use App\Log;
use App\Mandato;
use App\Paciente;
use App\Pagare;
use App\Prevision;
use App\Servicio;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NumberToWords\NumberToWords;
use PhpParser\Node\Expr\New_;

//agregado nuevo modelo
use App\Modalidad;
use App\Observacion;

class PagareController extends Controller
{
    public function createDeudorDeuda()
    {
        return view('digitador.pagares.deudor_deuda.create');
    }

    public function storeDeudorDeuda(CrearPagareRequest $request)
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


// creo cuotas con fechas de vencimiento y valor de coutas
        
        //return redirect()->route('pagare.paciente.create', [$pagare->id]);

        $log = Log::saveLog($pagare->codigo, 'NUEVO PAGARE');

        return redirect()->route('pagare.view', [$deudor->pagare->id]);
    }

    public function editDeudor(Deudor $deudor){
        if ($deudor->pagare->estado_id == 1){
            return view('digitador.pagares.deudor_deuda.edit_deudor', compact('deudor'));
        }else{
            abort('403');
        }
    }


    public function updateDeudor(EditarDeudorRequest $request, Deudor $deudor){

        $direccion = Direccion::findOrFail($deudor->direccion_id);

        $deudor->fill($request->all());
        $deudor->save();

        $direccion->fill($request->all());
        $direccion->save();

        $log = Log::saveLog($deudor->pagare->codigo, 'MODIFICACION DEUDOR');

        return redirect()->route('pagare.view', [$deudor->pagare->id]);
    }

    public function copiarDeudor(Pagare $pagare){

        $deudor = Deudor::findOrFail($pagare->deudor->id);
        $paciente = Paciente::findOrFail($pagare->paciente->id);

        $paciente->nombre = $deudor->nombre;
        $paciente->paterno = $deudor->paterno;
        $paciente->materno = $deudor->materno;
        $paciente->rut = formatoRut($deudor->rut) ;

        $paciente->save();


        return redirect()->route('pagare.paciente.edit', [$pagare->paciente_id]);
    }

    public function editPaciente(Paciente $paciente)
    {
        if ($paciente->pagare->estado_id == 1){

            // agregado $modalidad, guarda todas las opciones de modalidd activas
            $modalidad = Modalidad::where('activo', 1)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            
            $previsiones = Prevision::where('activo', 1)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            $servicios = Servicio::where('activo', 1)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();

            return view('digitador.pagares.paciente.edit', compact('paciente', 'previsiones', 'servicios', 'modalidad'));
        }else{
            abort('403');
        }
    }

    public function updatePaciente(EditarPacienteRequest $request, Paciente $paciente){

        $paciente->fill($request->all());
        $paciente->save();

        $log = Log::saveLog($paciente->pagare->codigo, 'MODIFICACION PACIENTE');

        return redirect()->route('pagare.view', [$paciente->pagare->id]);
    }

    public function editCodeudor(Codeudor $codeudor){

        if ($codeudor->pagare->estado_id == 1){
            return view('digitador.pagares.codeudor.edit', compact('codeudor'));
        }else{
            abort('403');
        }
    }

    public function updateCodeudor(EditarCodeudorRequest $request, Codeudor $codeudor){
        $direccion = Direccion::findOrFail($codeudor->direccion_id);

        $codeudor->fill($request->all());
        $codeudor->save();

        $direccion->fill($request->all());
        $direccion->save();

        $log = Log::saveLog($codeudor->pagare->codigo, 'MODIFICACION CODEUDOR');

        return redirect()->route('pagare.view', [$codeudor->pagare->id]);
    }

    public function editDeuda(Deuda $deuda){
        if ($deuda->pagare->estado_id == 1){
            return view('digitador.pagares.deudor_deuda.edit_deuda', compact('deuda'));
        }else{
            abort('403');
        }
    }

    public function updateDeuda(EditarDeudaRequest $request, Deuda $deuda){
        $deuda->fill($request->all());
        $deuda->save();

        $log = Log::saveLog($deuda->pagare->codigo, 'MODIFICACION DEUDA');

        return redirect()->route('pagare.view', [$deuda->pagare->id]);
    }

    public function createMandato(Pagare $pagare)
    {
        if ($pagare->estado_id == 1){
            return view('digitador.pagares.mandato.create', compact('pagare'));
        }else{
            abort('403');
        }
    }

    public function storeMandato(CrearMandatoRequest $request)
    {
        $mandato = Mandato::create($request->all());

        $pagare = Pagare::findOrFail($request->pagare_id);
        $pagare->mandato_id = $mandato->id;
        $pagare->save();

        $log = Log::saveLog($pagare->codigo, 'NUEVO MANDATO');

        return redirect()->route('pagare.view', [$pagare->id]);
    }

    public function editMandato(Mandato $mandato){
        if ($mandato->pagare->estado_id == 1){
            return view('digitador.pagares.mandato.edit', compact('mandato'));
        }else{
            abort('403');
        }
    }

    public function updateMandato(CrearMandatoRequest $request, Mandato $mandato){
        $mandato->fill($request->all());
        $mandato->save();

        $log = Log::saveLog($mandato->pagare->codigo, 'MODIFICACION MANDATO');

        return redirect()->route('pagare.view', [$mandato->pagare->id]);
    }

    public function createPago(Pagare $pagare)
    {
        $numero_cuota = Cuota::where('deuda_id',$pagare->deuda->id)->count();
        $numero_cuota = $numero_cuota + 1;

        if ($pagare->estado_id == 2){
            return view('digitador.pagares.pago.create', compact('pagare', 'numero_cuota'));
        }else{
            abort('403');
        }
    }

    public function storePago(CrearPagoRequest $request)
    {

        $request['f_pago'] = Carbon::parse($request['f_pago'])->format('Y-m-d');
        $cuota = Cuota::create($request->all());

        $log = Log::saveLog($cuota->deuda->pagare->codigo, 'INGRESO PAGO');

        return redirect()->route('pagare.view', [$cuota->deuda->pagare->id]);
    }

    public function updateEstado(Pagare $pagare)
    {
        $pagare->fecha = Carbon::now();
        $pagare->estado_id = 2;
        $pagare->numeracion = Pagare::numeroPagare();
        $pagare->save();

        $log = Log::saveLog($pagare->codigo, 'VALIDACION PAGARE');

        return redirect()->route('pagare.view', [$pagare->id]);
    }

    public function view(Pagare $pagare)
    {
        // cantidad de cuotas generadas
        $numero_pagos = Cuota::where('deuda_id', $pagare->deuda_id)->count();

        // traigo todas las cuotas
        $pagos = Cuota::where('deuda_id', $pagare->deuda_id)->get();

        // ultima cuota pagada
        $ultimo_pago = $pagos->where('estado','pagado')->last();

        // cantidad cuotas pagadas
        $cuotas_pagadas=$pagos->where('estado','pagado')->count();

        $observaciones = Observacion::where('pagare_id',$pagare->id)->get();
        return view('digitador.pagares.view', compact('pagare', 'ultimo_pago', 'numero_pagos', 'pagos','cuotas_pagadas','observaciones'));
    }

    // public function view(Pagare $pagare)
    // {
    //     $numero_pagos = Cuota::where('deuda_id', $pagare->deuda_id)->count();
    //     $pagos = Cuota::where('deuda_id', $pagare->deuda_id)->get();

    //     $ultimo_pago = $pagos->last();

    //     return view('digitador.pagares.view', compact('pagare', 'ultimo_pago', 'numero_pagos', 'pagos'));
    // }

    public function print(Pagare $pagare)
    {
        if ($pagare->deuda->total != null){
            $numberToWords = new NumberToWords();
            $numberTransformer = $numberToWords->getNumberTransformer('es');
            $pagare['valor_total'] = $pagare->deuda->total;
            $pagare['valor_total'] = $numberTransformer->toWords($pagare->valor_total) . ' pesos';
        }else{
            $pagare['valor_total'] = null;
        }

        return view('digitador.pagares.print', compact('pagare'));
    }
}
