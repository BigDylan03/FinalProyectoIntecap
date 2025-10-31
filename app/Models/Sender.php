<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    protected $table = 'senders';
    protected $primaryKey = 'id_sender';
    protected $fillable = [
        'first_name',
        'middle_name',
        'paternal_name',
        'maternal_name',
        'phone',
        'email',
        'id_state',
        'password'
    ];

    // Un remitente pertenece a un estado
    public function state()
    {
        return $this->belongsTo(State::class, 'id_state');
    }

    // Un remitente puede tener muchas transacciones
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_sender');
    }
}

