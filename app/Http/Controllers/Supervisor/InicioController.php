<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Requests\BuscarCodigoRequest;
use App\Http\Requests\BuscarNumeroRequest;
use App\Http\Requests\BuscarRutRequest;
use App\Pagare;
use App\Paciente;
use App\Deudor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Freshwork\ChileanBundle\Rut;

class InicioController extends Controller
{
    public function index()
    {
        $num_pagare_abierto = Pagare::contadorSinValidar();

        return view('supervisor.inicio.index', compact('num_pagare_abierto', 'pagares'));
    }

    public function findCodigoa(BuscarCodigoRequest $request)
    {
        $pagare = Pagare::buscarCodigo($request->codigo);

        return redirect()->route('supervisor.pagare.view', [$pagare->id]);
    }



    public function findNumero(BuscarNumeroRequest $request)
    {

        $pagares = Pagare::buscarNumeroPagare($request->numeracion);

        return view('supervisor.inicio.listado', compact('pagares'));
    }



    

    public function findRut(BuscarRutRequest $request)
    {
        $pagares = Pagare::buscarRutDeudor($request->rut);

        return view('supervisor.inicio.listado', compact('pagares'));
    }


    public function findPaciente(Request $paciente)
    {

        $pagares_rut = Pagare::buscarRutDeudor($paciente->d_paciente);
//return dd($pagares->count());
// $query = Paciente::where('full_nombre', 'LIKE', "%$paciente->d_paciente%");
// var_dump($query);
// die();

//OJO SIN EL ->GET(); TE ARROAJA DATOS DE LA PETICION Y NO LOS DATOS

//$pacientes = DB::table('pacientes')->where('full_nombre', 'LIKE', "%$paciente->d_paciente%")->get();


$rut = Rut::parse($paciente->d_paciente)->number();
 // $pagares = Pagare::whereHas('deudor', function ($q) use ($rut){
 //            $q->rut($rut);
 //        })->get();

        
//return dd($pagares);

//$query = Paciente::all();
//return dd($query);



        $pagares = DB::table('pagares')
            ->join('deudores', 'pagares.deudor_id', '=', 'deudores.id')
            ->join('pacientes', 'pagares.paciente_id', '=', 'pacientes.id')
            ->select('pagares.numeracion', 'pagares.created_at', 'deudores.full_nombre AS deudor_nombre','deudores.rut AS deudor_rut', 'pacientes.full_nombre AS paciente_nombre', 'pacientes.rut AS paciente_rut','pagares.id')
            ->where('pacientes.rut', 'LIKE', "%$rut%")
            ->get();

        if($pagares->count()!=0){
            //return dd("registro rut ".$pagares_rut->count());
            return view('supervisor.inicio.listado_pacientes', compact('pagares'));
        }else{
            $pagares = DB::table('pagares')
            ->join('deudores', 'pagares.deudor_id', '=', 'deudores.id')
            ->join('pacientes', 'pagares.paciente_id', '=', 'pacientes.id')
            ->select('pagares.numeracion', 'pagares.created_at', 'deudores.full_nombre AS deudor_nombre','deudores.rut AS deudor_rut', 'pacientes.full_nombre AS paciente_nombre', 'pacientes.rut AS paciente_rut','pagares.id')
            ->where('pacientes.full_nombre', 'LIKE', "%$paciente->d_paciente%")
            ->get();
            //return dd("registro nombre ".$pagares_nombre->count());
            return view('supervisor.inicio.listado_pacientes', compact('pagares'));
        }

        //return view('supervisor.inicio.listado', compact('pagares'));
        //                      return dd($paciente->d_paciente);

 
    }


    public function misPagare()
    {
        $pagares = Pagare::buscarMisPagare();

        return view('supervisor.inicio.listado_mis_pagare', compact('pagares'));
    }

    public function sinValidar()
    {
        $pagares = Pagare::buscarSinValidar();

        return view('supervisor.inicio.listado_sin_validar', compact('pagares'));
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


//return dd($pagare_rut->count());
        //$pagares_rut = Pagare::buscarRutDeudor($request->dato);

           //return response()->json(['pagares_rut' => $pagares_rut->count()]);

        
            // SI EL REQUEST ES TIPO AJA DEVOLVER ALGO
            //if($request->ajax()){
                //return response()->json([
                        // DEVUELVO VARIABLE MENSAJE CON VALOR "HOLA"
                  //      "mensaje"=>"hola"
                //]);
            //}
            //return dd("hola_ajax");
    }


}
