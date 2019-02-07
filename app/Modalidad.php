<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
	// como laravel pluraliza la db aqui defino el nombre real de la tabla que buscara el modelo 
    protected $table = 'modalidad';

   	// llenado masivo de datos, esta linea da autotrizacion para estos campos
    protected $fillable = ['nombre', 'activo'];
 
  public static function paginateModalidad($modalidad)
    {
        return Modalidad::modalidad($modalidad)
            ->orderBy('nombre', 'ASC')
            ->paginate(5);
    }

    public function scopeServicio($query, $modalidad)
    {
        if ($modalidad != null){
            $query->where('nombre','LIKE', "%$modalidad%");
        }
    }

    public function save(array $options = array())
    {
        $this->nombre = Str::upper($this->nombre);

        parent::save($options);
    }
}