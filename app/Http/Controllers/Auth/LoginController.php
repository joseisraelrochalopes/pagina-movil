<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar el formulario de login
    public function show()
    {
        return view('auth.login');
    }

    // Manejar el login del usuario
    public function handle(Request $request)
    {
        // Validar los datos del formulario de login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirigir según el rol del usuario
            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }

        // Si las credenciales no son correctas, redirigir de nuevo al login con un error
        return back()->withErrors(['email' => 'Las credenciales no coinciden.'])->withInput();
    }
}
