<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prevision extends Model
{
    protected $table = 'previsiones';

    protected $fillable = ['nombre', 'activo'];

    public static function paginatePrevision($prevision)
    {
        return Prevision::prevision($prevision)
            ->orderBy('nombre', 'ASC')
            ->paginate(5);
    }

    public function scopePrevision($query, $prevision)
    {
        if ($prevision != null){
            $query->where('nombre','LIKE', "%$prevision%");
        }
    }

    public function save(array $options = array())
    {
        $this->nombre = Str::upper($this->nombre);

        parent::save($options);
    }
}
