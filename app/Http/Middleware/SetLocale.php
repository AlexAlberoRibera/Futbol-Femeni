<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Ejemplo: configurar el idioma
        app()->setLocale($request->get('lang', 'en'));

        return $next($request);
    }
}
