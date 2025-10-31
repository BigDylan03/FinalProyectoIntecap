<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'id_transaction';
    protected $fillable = [
        'id_sender', 'id_receiver', 'sending_account', 'paying_account',
        'origination_state_id', 'destination_state_id',
        'send_amount', 'charge', 'status', 'date'
    ];

    // Relaciones
    public function sender()
    {
        return $this->belongsTo(Sender::class, 'id_sender');
    }

    public function receiver()
    {
        return $this->belongsTo(Receiver::class, 'id_receiver');
    }

    public function sendingAccount()
    {
        return $this->belongsTo(Account::class, 'sending_account');
    }

    public function payingAccount()
    {
        return $this->belongsTo(Account::class, 'paying_account');
    }

    public function originationState()
    {
        return $this->belongsTo(State::class, 'origination_state_id');
    }

    public function destinationState()
    {
        return $this->belongsTo(State::class, 'destination_state_id');
    }
}
