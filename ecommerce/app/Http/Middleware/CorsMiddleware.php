<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Define os cabeçalhos CORS
        $response->headers->set('Access-Control-Allow-Origin', '*'); // Permite qualquer origem
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

        // Se for uma requisição OPTIONS, retornamos uma resposta vazia
        if ($request->isMethod('OPTIONS')) {
            return Response('', 200, $response->headers->all());
        }

        return $response;
    }
}
