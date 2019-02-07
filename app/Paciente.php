<?php

namespace App;

use Freshwork\ChileanBundle\Rut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'full_nombre',
        'rut',
        'pasaporte',
        'vas',
        'dau',
        'medico',
        'servicio_id',
        'prevision_id',
        'modalidad_id',
        'prestacion'
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

        $this->medico = Str::upper($this->medico);

        parent::save($options);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    public function prevision()
    {
        return $this->belongsTo(Prevision::class, 'prevision_id');
    }

    public function pagare()
    {
        return $this->hasOne(Pagare::class, 'paciente_id');
    }
}
