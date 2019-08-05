<?php

namespace Liberty;

use Illuminate\Database\Eloquent\Model;
use Calendar;

class Activity extends Model
{
    protected $fillable = ['id', 'nombre', 'descripcion', 'fecha', 'hora_inicio', 'hora_fin', 'user_id'];

    public function user()
    {
        return $this->belongsTo('Liberty\User');

    }

    public function inscription()
    {
        return $this->hasMany('Liberty\Inscription');
    }
}
