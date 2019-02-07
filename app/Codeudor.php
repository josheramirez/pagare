<?php

namespace App;

use Freshwork\ChileanBundle\Rut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Codeudor extends Model
{
    protected $table = 'codeudores';

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'full_nombre',
        'rut',
        'pasaporte',
        'nacionalidad',
        'profesion',
        'direccion_id'
    ];

    public function save(array $options = array())
    {
        if ($this->nombre !== null){
            $this->nombre = Str::upper($this->nombre);
        }
        if ($this->paterno !== null){
            $this->paterno = Str::upper($this->paterno);
        }
        if ($this->materno !== null){
            $this->materno = Str::upper($this->materno);
        }
        if ($this->nombre !== null || $this->paterno !== null || $this->materno !== null){
            $this->full_nombre = $this->nombre.' '.$this->paterno.' '.$this->materno;
        }
        if ($this->rut !== null){
            $this->rut = Rut::parse($this->rut)->number(); //return '12345678'
        }
        $this->nacionalidad = Str::upper($this->nacionalidad);
        $this->profesion = Str::upper($this->profesion);

        parent::save($options);
    }

    public function pagare()
    {
        return $this->hasOne(Pagare::class, 'codeudor_id');
    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }
}
