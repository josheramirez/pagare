<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = ['nombre', 'activo'];

    public static function paginateServicio($servicio)
    {
        return Servicio::servicio($servicio)
            ->orderBy('nombre', 'ASC')
            ->paginate(5);
    }

    public function scopeServicio($query, $servicio)
    {
        if ($servicio != null){
            $query->where('nombre','LIKE', "%$servicio%");
        }
    }

    public function save(array $options = array())
    {
        $this->nombre = Str::upper($this->nombre);

        parent::save($options);
    }
}
