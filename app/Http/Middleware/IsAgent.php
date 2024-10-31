<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAgent
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'agent') {
            return $next($request);
        }else{
            return redirect('/'); // Rediriger si l'utilisateur n'est pas un agent
      }
   }

        
 }

