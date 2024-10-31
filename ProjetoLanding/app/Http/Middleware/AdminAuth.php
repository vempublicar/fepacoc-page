<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Autenticação simples com usuário e senha no .env
        $adminUser = env('ADMIN_USER');
        $adminPassword = env('ADMIN_PASSWORD');

        if ($request->getUser() !== $adminUser || $request->getPassword() !== $adminPassword) {
            return response('Acesso negado', 401, ['WWW-Authenticate' => 'Basic']);
        }

        return $next($request);
    }
}
