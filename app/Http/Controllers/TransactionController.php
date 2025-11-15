<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Receiver;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('id_sender', Auth::user()->id_sender)
            ->with(['receiver', 'sendingAccount', 'payingAccount'])
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $sender = Auth::user();
        $receivers = Receiver::where('id_sender', $sender->id_sender)->with('state')->get();
        $accounts = Account::all();

        return view('transactions.create', compact('receivers', 'accounts'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_receiver' => 'required|exists:receivers,id_receiver',
            'sending_account' => 'required|exists:accounts,id_account',
            'paying_account' => 'required|exists:accounts,id_account',
            'send_amount' => 'required|numeric|min:1',
        ]);

        $receiver = Receiver::with('state')->findOrFail($validated['id_receiver']);
        $sender = Auth::user();

        $charge = $validated['send_amount'] * 0.05;

        $mtcn = Transaction::generateMtcn();

        Transaction::create([
            'id_sender' => $sender->id_sender,
            'id_receiver' => $receiver->id_receiver,
            'sending_account' => $validated['sending_account'],
            'paying_account' => $validated['paying_account'],
            'origination_state_id' => $sender->id_state ?? null,
            'destination_state_id' => $receiver->id_state ?? null,
            'send_amount' => $validated['send_amount'],
            'charge' => $charge,
            'status' => 'En progreso',
            'date' => Carbon::now(),
            'mtcn' => $mtcn,
        ]);

        return redirect()->route('transactions.mtcn')
            ->with('mtcn', $mtcn)
            ->with('success', 'Transacción creada correctamente.');

    }

}
