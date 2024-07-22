<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LibraryUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           //Verifica si o usuario logado é do tipo bibliotecario
           if (!Auth::check()) {
            return redirect('login'); // Redirect to login if not logged in
        }

        $user = Auth::user();
        if ($user->type != "bibliotecario") {
            session()->flash('error', 'Você não têm autorização para acessar aquela area');

            return redirect()->route('show.home'); // Redirecionar para página não autorizada se não for usuário bibliotecario
        }
        return $next($request);
    }
}
