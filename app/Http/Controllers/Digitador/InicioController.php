<?php

namespace App\Http\Controllers\Digitador;

use App\Http\Requests\BuscarCodigoRequest;
use App\Http\Requests\BuscarNumeroRequest;
use App\Http\Requests\BuscarRutRequest;
use App\Paciente;
use App\Pagare;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;


class InicioController extends Controller
{
    public function index()
    {
        $num_pagare = Pagare::contadorMisPagare();
        $num_pagare_abierto = Pagare::contadorSinValidar();

        return view('digitador.inicio.index', compact('num_pagare', 'num_pagare_abierto', 'pagares'));
    }

    public function findCodigo(BuscarCodigoRequest $request)
    {
        $pagare = Pagare::buscarCodigo($request->codigo);

        return redirect()->route('pagare.view', [$pagare->id]);
    }

    public function findNumero(BuscarNumeroRequest $request)
    {

        $pagares = Pagare::buscarNumeroPagare($request->numeracion);

        return view('digitador.inicio.listado', compact('pagares'));
    }

    public function findRut(BuscarRutRequest $request)
    {
        $pagares = Pagare::buscarRutDeudor($request->rut);

        return view('digitador.inicio.listado', compact('pagares'));
    }

    public function misPagare()
    {
        $pagares = Pagare::buscarMisPagare();

        return view('digitador.inicio.listado_mis_pagare', compact('pagares'));
    }

    public function sinValidar()
    {
        $pagares = Pagare::buscarSinValidar_digitador();

        return view('digitador.inicio.listado_sin_validar', compact('pagares'));
    }

// NUEVO CODIGO 

      public function findPaciente(Request $paciente)
    {

        $pagares_rut = Pagare::buscarRutDeudor($paciente->d_paciente);
        $rut = Rut::parse($paciente->d_paciente)->number();

        $pagares = DB::table('pagares')
            ->join('deudores', 'pagares.deudor_id', '=', 'deudores.id')
            ->join('pacientes', 'pagares.paciente_id', '=', 'pacientes.id')
            ->select('pagares.numeracion', 'pagares.created_at', 'deudores.full_nombre AS deudor_nombre','deudores.rut AS deudor_rut', 'pacientes.full_nombre AS paciente_nombre', 'pacientes.rut AS paciente_rut','pagares.id')
            ->where('pacientes.rut', 'LIKE', "%$rut%")
            ->get();

        if($pagares->count()!=0){
            return view('digitador.inicio.listado_pacientes', compact('pagares'));
        }else{
            $pagares = DB::table('pagares')
            ->join('deudores', 'pagares.deudor_id', '=', 'deudores.id')
            ->join('pacientes', 'pagares.paciente_id', '=', 'pacientes.id')
            ->select('pagares.numeracion', 'pagares.created_at', 'deudores.full_nombre AS deudor_nombre','deudores.rut AS deudor_rut', 'pacientes.full_nombre AS paciente_nombre', 'pacientes.rut AS paciente_rut','pagares.id')
            ->where('pacientes.full_nombre', 'LIKE', "%$paciente->d_paciente%")
            ->get();
            return view('digitador.inicio.listado_pacientes', compact('pagares'));
        }
 
    }

    public function peticion_ajax(Request $request)
    {
        //guardo ultimo dato de cadena
        $cv=substr($request->dato, -1);
        //quito ultimo dato de la cadena
        $nuevo_rut=substr($request->dato, 0, -1);
        if(Rut::parse($request->dato)->validate()){

                    $pagares_rut = DB::table('pagares')
                    ->join('deudores', 'pagares.deudor_id', '=', 'deudores.id')
                    ->select('pagares.*')
                    ->where('deudores.rut','=',$nuevo_rut)
                    ->get();
                    return response()->json(['pagares_rut' => $pagares_rut->count()]);

        }else{
        return response()->json(['pagares_rut' => 0]);
        }
    }


}


