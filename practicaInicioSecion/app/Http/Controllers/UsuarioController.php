<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        // Verificar el rol del usuario
        if ($user->role === 'admin') {
            // Redirigir a la página de administrador
            return redirect()->route('admiHome');
        } elseif ($user->role === 'client') {
            // Redirigir a la página del cliente
            return redirect()->route('catalogo');
        }

        // Redirigir a una página por defecto si no se encuentra el rol (opcional)
        return redirect('/home');
    }
}
