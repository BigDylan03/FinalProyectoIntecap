<?php

namespace App\Http\Controllers;

use App\Models\Sender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException as ValidationException;

class LoginController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated))
        {
            $request->session()->regenerate();
            return redirect()->route('menu.menu');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Credenciales Incorrectas'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    
    public function showMenu()
    {
        return view('menu.menu');
    }

    public function showSend()
    {
        return view('menu.send');
    }
    
    public function showUpdate()
    {
        return view('menu.update');
    }

    public function showDelete()
    {
        return view('menu.delete');
    }

    public function showReceiverForm()
    {
        return view('menu.receiver');
    }

}