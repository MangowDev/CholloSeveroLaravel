<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validación de las credenciales
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Obtener el usuario por el nombre de usuario
        $user = User::where('name', $request->name)->first();

        // Verificar las credenciales
        if (!$user || !password_verify($request->password, $user->password)) {
            return redirect()->route('login')->with('message', 'Incorrect username or password.');
        }

        // Iniciar sesión
        Auth::login($user);

        // Redirigir a chollos
        return redirect()->route('chollos');
    }

    public function logout()
    {
        // Cerrar sesión
        Auth::logout();

        // Redirigir al login
        return redirect()->route('login');
    }
}
