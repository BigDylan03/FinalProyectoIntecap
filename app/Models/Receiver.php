<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $primaryKey = 'id_receiver';
    protected $fillable = [
        'first_name', 'middle_name', 'paternal_name', 'maternal_name',
        'id_state'
    ];

    // Un beneficiario pertenece a un estado
    public function state()
    {
        return $this->belongsTo(State::class, 'id_state');
    }

    // Un beneficiario puede recibir muchas transacciones
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_receiver');
    }
}
