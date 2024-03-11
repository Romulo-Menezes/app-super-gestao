<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $metodo_verificacao, string $perfil): Response
    {
        echo "Método de verificação: $metodo_verificacao | Perfil: $perfil <br>";
        if ($metodo_verificacao == 'padrao') {
            echo 'Verificar o usuário e senha no banco de dados <br>';
        } elseif ($metodo_verificacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD <br>';
        }

        if ($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos <br>';
        } else {
            echo 'Carregar perfil do banco de dados';
        }


        if (true) {
            return $next($request);
        } else {
            return Response('Acesso negado! Rota exige autenticação!!!');
        }
    }
}
