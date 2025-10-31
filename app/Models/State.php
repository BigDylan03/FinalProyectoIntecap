<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    protected $primaryKey = 'id_state';
    protected $fillable = ['name'];

    public function senders()
    {
        return $this->hasMany(Sender::class, 'id_state');
    }

    public function receivers()
    {
        return $this->hasMany(Receiver::class, 'id_state');
    }

}
