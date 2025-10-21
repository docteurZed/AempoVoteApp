<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cei
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // $user = Auth::user();

        // if (!$user) {
        //     redirect('/admin/login');
        // } elseif (!in_array($user->role, ['admin', 'cei'])) {
        //     abort(403, 'Accès refusé');
        // }

        return $response;
    }
}
