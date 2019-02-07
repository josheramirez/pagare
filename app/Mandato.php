<?php

namespace App;

use Freshwork\ChileanBundle\Rut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mandato extends Model
{
    protected $table = 'mandatos';

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'full_nombre',
        'rut'
    ];

    public function save(array $options = array())
    {
        $this->nombre = Str::upper($this->nombre);
        $this->paterno = Str::upper($this->paterno);
        $this->materno = Str::upper($this->materno);
        $this->full_nombre = $this->nombre.' '.$this->paterno.' '.$this->materno;

        if ($this->rut !== null){
            $this->rut = Rut::parse($this->rut)->number(); //return '12345678'
        }

        parent::save($options);
    }

    public function pagare()
    {
        return $this->hasOne(Pagare::class, 'mandato_id');
    }
}
