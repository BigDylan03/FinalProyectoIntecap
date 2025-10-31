<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $primaryKey = 'id_account';
    protected $fillable = ['bank_name', 'account_number', 'balance'];

    // Una cuenta puede enviar muchas transacciones
    public function sentTransactions()
    {
        return $this->hasMany(Transaction::class, 'sending_account');
    }

    // Una cuenta puede pagar muchas transacciones
    public function paidTransactions()
    {
        return $this->hasMany(Transaction::class, 'paying_account');
    }
}
