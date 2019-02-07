<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observaciones';

    protected $fillable = [

        'user_id',
        'pagare_id',
        'observacion'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
