<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role=null): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); 
        }

        $user = Auth::user();
        if ($role && $user->role !== $role) {
            abort(403, 'Unauthorized'); 
        }

        return $next($request);
    }
}
