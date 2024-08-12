<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LibraryUserApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  $user = Auth::user();
        if ($user->type != "bibliotecario") {
            return response()->json(['message' => 'You do not have autorization'], Response::HTTP_NOT_FOUND); 
        }

        return $next($request);
    }
}
