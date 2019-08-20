<?php

namespace Liberty;

use Illuminate\Database\Eloquent\Model;
use Liberty\User;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'date_and_time', 'message', 'num', 'status', 'user_id'
    ];

    /*
    Un Usuario puede tener muchas reservas
    */
    public function user()
    {
        return $this->belongsTo('Liberty\User');
    }
    
}
