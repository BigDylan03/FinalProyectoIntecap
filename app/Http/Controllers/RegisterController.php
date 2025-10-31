<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Sender;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'paternal_name' => 'required|string|max:50',
            'maternal_name' => 'nullable|string|max:50',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:senders,email',
            'id_state' => 'required|exists:states,id_state',
            'password' => 'required|min:8',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Sender::create($validated);

        // 3️⃣ Redirigir o mostrar mensaje de éxito
        return redirect()->back()->with('success', 'Usuario registrado correctamente.');
    }
}
