<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateNumbers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si la ruta y los parámetros están definidos
        $route = $request->route();

        // Asegurarse de que los parámetros estén disponibles
        if ($route) {
            $parameters = $route->parameters();
            $n1 = $parameters['n1'] ?? null;
            $n2 = $parameters['n2'] ?? null;

            // Validar que los parámetros sean numéricos
            if (!is_numeric($n1) || !is_numeric($n2)) {
                return response()->json([
                    'error' => 'Both parameters must be valid numbers.'
                ], 400);
            }
        } else {
            return response()->json([
                'error' => 'Route parameters not found.'
            ], 400);
        }

        return $next($request);
    }
}
