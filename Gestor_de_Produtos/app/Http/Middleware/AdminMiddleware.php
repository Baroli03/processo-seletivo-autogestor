<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Não esqueça de importar o Facade Auth
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está logado E se a propriedade is_admin é verdadeira
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); // Permite que a requisição continue
        }

        // Se o usuário não estiver logado OU não for admin, redireciona
        // para o dashboard padrão com uma mensagem de erro.
        // O `session()->flash()` permite que a mensagem seja exibida uma única vez na próxima requisição.
        return redirect()->route('dashboard')->with('error', 'Acesso negado. Você não tem permissão de administrador para esta área.');
    }
}