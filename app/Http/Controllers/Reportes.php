<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuota;

class Reportes extends Controller
{
    public function listar()
    {
        $lista_pagares = DB::table('pagares')
            ->join('pacientes', 'pagares.pacientes_id', '=', 'pacientes.id')
            ->join('deudores', 'pagares.deudor_id', '=', 'deudores.id')
            ->join('direcciones', 'deudores.direcciones_id', '=', 'direcciones_id')
            ->leftJoin('previsiones', 'pacientes.previsiones_id', '=', 'previsiones.id')
            ->join('deudas', 'pagares.deudas_id', '=', 'deudas_id')
            ->select('users.*')
            ->get();

        //return view('reporte', compact('lista_pagares'));
        //return var_dump($lista_pagares);
    }

    public function listar_cuotas($id)
    {
         $cuotas= Cuota::where('deuda_id', $id)->get();
       	 
       	 return dd($cuotas);
       	 //return view('listar_cuotas', compact('cuotas'));
       	 //return $cuotas;

    }
}
