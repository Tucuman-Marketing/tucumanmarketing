<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogUserDetails
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Verificar si hay un error en la respuesta
        if ($response->status() >= 400) {
            $user = Auth::user();
            $logMessage = [
                'route' => $request->fullUrl(),
                'method' => $request->method(),
                'status' => $response->status(),
                'user_id' => $user ? $user->id : null,
                'user_name' => $user ? $user->name : null,
            ];

            Log::channel('discord')->error('Error detected', $logMessage);
        }

        return $response;
    }
}
