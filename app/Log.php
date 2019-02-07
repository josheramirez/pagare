<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'rut',
        'usuario',
        'pagare',
        'accion',
    ];

    public static function saveLog($codigo, $accion)
    {
        $user = Auth::user();

        $log = New Log;
        $log->rut = $user->rut;
        $log->usuario = $user->username;
        $log->pagare = $codigo;
        $log->accion = $accion;
        $log->save();
    }
}
