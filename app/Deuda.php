<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    protected $table = 'deudas';

    protected $fillable = [
        'total',
        'n_cuota',
        'valor_cuota',
        'saldo',
        'vencimiento',
        'plazo',

// nuevos parametros agregados
        'estado',
        'f_vencimiento'

    ];

    public function pagare()
    {
        return $this->hasOne(Pagare::class, 'deuda_id');
    }

    public function cuota()
    {
        return $this->hasOne(Cuota::class, 'deuda_id');
    }
}
