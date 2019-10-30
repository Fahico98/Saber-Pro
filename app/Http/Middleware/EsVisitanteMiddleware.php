<?php

namespace ProyectIcfes\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsVisitanteMiddleware{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::check()){
            $user = Auth::user();
            return ($user->role->name === "visitante") ? $next($request) : redirect('home');
        }
        return redirect('login');
    }
}
