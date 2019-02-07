<?php

namespace App;

use Freshwork\ChileanBundle\Rut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Deudor extends Model
{
    protected $table = 'deudores';

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'full_nombre',
        'rut',
        'pasaporte',
        'nacionalidad',
        'direccion_id'
    ];

    public function save(array $options = array())
    {
        $this->nombre = Str::upper($this->nombre);
        $this->paterno = Str::upper($this->paterno);
        $this->materno = Str::upper($this->materno);
        $this->full_nombre = $this->nombre.' '.$this->paterno.' '.$this->materno;
        $this->nacionalidad = Str::upper($this->nacionalidad);

        if ($this->rut !== null){
            $this->rut = Rut::parse($this->rut)->number(); //return '12345678'
        }

        parent::save($options);
    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    public function pagare()
    {
        return $this->hasOne(Pagare::class, 'deudor_id');
    }

    public function scopeRut($query, $rut)
    {
        if(trim($rut) != "")
        {
            $query->where('rut', $rut);
        }
    }
}
