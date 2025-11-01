<?php

namespace App\Http\Controllers;

use App\Models\Sender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        // Verificar si ya está logueado usando session
        if(session('sender_logged_in')) {
            return view('menu');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        // Validación
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Buscar el sender por email
        $sender = Sender::where('email', $request->email)->first();

        // Verificar si existe y si la contraseña coincide
        if ($sender && Hash::check($request->password, $sender->password)) {
            // Crear sesión manualmente
            session([
                'sender_logged_in' => true,
                'sender_id' => $sender->id_sender,
                'sender_email' => $sender->email,
                'sender_name' => $sender->first_name . ' ' . $sender->paternal_name
            ]);

            return redirect()->route('menu')->with('success', '¡Bienvenido!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('email');
    }

    public function logados()
    {
        // Verificar sesión manualmente
        if (Auth::check()) {
            return view('menu');
        }
        
        return redirect("/")->with('error', 'No tienes acceso, por favor inicia sesión');
    }

    public function logout(Request $request)
    {
        // Limpiar sesión manualmente
        session()->forget([
            'sender_logged_in',
            'sender_id', 
            'sender_email',
            'sender_name'
        ]);
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }

    // Método helper para obtener el sender actual
    public static function getCurrentSender()
    {
        if (session('sender_logged_in')) {
            return Sender::find(session('sender_id'));
        }
        return null;
    }
}