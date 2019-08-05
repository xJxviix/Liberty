<?php

namespace Liberty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inscription extends Model
{
    use Notifiable;

    protected $fillable = [
        'id','activity_id','email'
    ];


    public function activity(){
        return $this->hasOne('Liberty\Activity');
    }
}
