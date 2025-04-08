<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Muestra el formulario de registro
    public function show()
    {
        return view('auth.register');
    }

    // Maneja el registro del usuario
    public function handle(Request $request)
    {
        // Valida los datos del formulario de registro
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Asigna el rol basado en el correo
        $role = ($request->email === 'admin@email.com') ? 'admin' : 'user';

        // Asigna la contraseña predeterminada para el admin, de lo contrario, usa la proporcionada
        $password = ($request->email === 'admin@gmail.com') ? Hash::make('admin123') : Hash::make($request->password);

        // Crea el nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role' => $role,  // Asigna el rol automáticamente
        ]);

        // Logea al usuario recién creado
        Auth::login($user);

        // Redirige al home después de registrar al usuario
        return redirect()->route('home');
    }
}
