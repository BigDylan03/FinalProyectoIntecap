<?php

namespace App\Http\Controllers;

use App\Models\Receiver;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiverController extends Controller
{

    public function index()
    {
        $senderId = Auth::user()->id_sender;

        $receivers = Receiver::where('id_sender', $senderId)
            ->with('state')
            ->get();

        return view('receivers.index', compact('receivers'));
    }

    public function create()
    {
        $states = State::all();
        return view('menu.receiver', compact('states'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'paternal_name' => 'required|string|max:50',
            'maternal_name' => 'nullable|string|max:50',
            'id_state' => 'required|exists:states,id_state',
        ]);

        $validated['id_sender'] = Auth::user()->id_sender;

        Receiver::create($validated);

        return redirect()->route('receivers.index')->with('success', 'Beneficiario registrado correctamente.');
    }

    public function edit($id)
    {
        $receiver = Receiver::where('id_sender', Auth::user()->id_sender)
            ->findOrFail($id);

        $states = State::all();

        return view('receivers.edit', compact('receiver', 'states'));
    }

    public function update(Request $request, $id)
    {
        $receiver = Receiver::where('id_sender', Auth::user()->id_sender)
            ->findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'paternal_name' => 'required|string|max:50',
            'maternal_name' => 'nullable|string|max:50',
            'id_state' => 'required|exists:states,id_state',
        ]);

        $receiver->update($validated);

        return redirect()->route('receivers.index')->with('success', 'Beneficiario actualizado correctamente.');
    }
    public function destroy($id)
    {
        $receiver = Receiver::where('id_sender', Auth::user()->id_sender)
            ->findOrFail($id);

        $receiver->delete();

        return redirect()->route('receivers.index')->with('success', 'Beneficiario eliminado correctamente.');
    }
}
