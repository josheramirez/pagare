<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cuota extends Model
{
    protected $table = 'cuotas';

    protected $fillable = [
        'n_cuota',
        'monto',
        'monto_pagado',
        'f_pago',
        'deuda_id',
        'estado',
        'detalle',
        'n_boleta',
        'deuda_id',
        'f_vencimiento'
    ];

    public function save(array $options = array())
    {
        $this->detalle = Str::upper($this->detalle);

        parent::save($options);
    }

    public function deuda()
    {
        return $this->belongsTo(Deuda::class, 'deuda_id');
    }
}
