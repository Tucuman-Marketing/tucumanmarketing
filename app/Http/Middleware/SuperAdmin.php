<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Auth;

class SuperAdmin
{

    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y si tiene el rol 'superadmin'
        if (Auth::check() && Auth::user()->hasRole('superadmin')) {
            return $next($request);
        }

        // Si el usuario no tiene el rol 'superadmin', puedes redirigirlo o abortar la solicitud
        // Redirigir al usuario a la página de inicio con un mensaje de error
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta sección');
    }


}
