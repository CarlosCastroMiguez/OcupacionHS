<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if (!auth()->check()) { //si no ha iniciado sesión al login
            return redirect('login');
        }
        if (auth()->user()->role != 0 ) { //not admin
            return redirect('home');
        }
        return $next($request);
    }
}
