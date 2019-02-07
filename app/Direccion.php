<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Direccion extends Model
{
    protected $table = 'direcciones';

    protected $fillable = [
        'calle',
        'numero',
        'departamento',
        'poblacion',
        'comuna',
        'ciudad',
        'fono',
        'email'
    ];

    public function save(array $options = array())
    {
        $this->calle = Str::upper($this->calle);
        $this->numero = Str::upper($this->numero);
        $this->departamento = Str::upper($this->departamento);
        $this->poblacion = Str::upper($this->poblacion);
        $this->comuna = Str::upper($this->comuna);
        $this->ciudad = Str::upper($this->ciudad);
        $this->fono = Str::upper($this->fono);
        $this->email = Str::upper($this->email);

        parent::save($options);
    }
}
