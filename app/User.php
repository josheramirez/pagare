<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'full_nombre',
        'rut',
        'username',
        'password',
        'activo',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if( ! empty($value))
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function save(array $options = array())
    {
        $this->nombre = Str::upper($this->nombre);
        $this->paterno = Str::upper($this->paterno);
        $this->materno = Str::upper($this->materno);
        $this->full_nombre = $this->nombre.' '.$this->paterno.' '.$this->materno;

        parent::save($options);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
