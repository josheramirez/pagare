<?php

namespace App;

use Carbon\Carbon;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pagare extends Model
{
    protected $table = 'pagares';

    protected $fillable = [
        'motivo_fecha',
        'motivo_autor',
        'numeracion',
        'codigo',
        'fecha',
        'paciente_id',
        'deudor_id',
        'codeudor_id',
        'deuda_id',
        'mandato_id',
        'user_id',
        'estado_id',

        // campo motivo en tabla pagares
        'motivo'
    ];

    public static function numeroPagare()
    {
        $n_pagare = Pagare::whereYear('fecha', Carbon::now()->format('Y'))
            ->where('estado_id', '<>', 1)
            ->get();

        if ($n_pagare->isEmpty())
        {
            return 1;
        }else{
            $n_pagare = $n_pagare->max('numeracion');
            return $n_pagare + 1;
        }
    }

    public static function codigoPagare()
    {
        $codigo_pagare = Pagare::whereYear('created_at', Carbon::now()->format('Y'))
            ->whereMonth('created_at', Carbon::now()->format('m'))
            ->count();

        $codigo_pagare = $codigo_pagare +1;

        $codigo_pagare = str_pad($codigo_pagare, 3, "0", STR_PAD_LEFT);

        return Carbon::now()->format('y') . Carbon::now()->format('m'). $codigo_pagare;

    }

    public function deudor()
    {
        return $this->belongsTo(Deudor::class, 'deudor_id');
    }

    public function codeudor()
    {
        return $this->belongsTo(Codeudor::class, 'codeudor_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function deuda()
    {
        return $this->belongsTo(Deuda::class, 'deuda_id');
    }

    public function mandato()
    {
        return $this->belongsTo(Mandato::class, 'mandato_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function contadorMisPagare()
    {
        return Pagare::where('user_id', Auth::user()->id)->count();
    }

    public static function contadorSinValidar()
    {
        return Pagare::where('user_id', Auth::user()->id)->where('estado_id',1)->count();
    }

    public static function buscarCodigo($codigo)
    {
        return Pagare::where('codigo', $codigo)->first();
    }

    public static function buscarNumeroPagare($numero)
    {
        return Pagare::where('numeracion', $numero)->get();
    }

    public static function buscarRutDeudor($rut)
    {
        $rut = Rut::parse($rut)->number();

        $pagares = Pagare::whereHas('deudor', function ($q) use ($rut){
            $q->rut($rut);
        })->get();

        return $pagares;
    }

    public static function buscarMisPagare()
    {
        return Pagare::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public static function buscarSinValidar()
    {
        return Pagare::where('estado_id', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }


// agregado bsuqueda de pagares solo creados por digitador especifico
    public static function buscarSinValidar_digitador()
    {
        return Pagare::where('estado_id', 1)
        ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }


}
