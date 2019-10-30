<?php

namespace ProyectIcfes\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsDocEstInvMiddleware{

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
            return ($user->role->name === "doc-est-inv" || $user->role->name === "administrador")?
                $next($request):
                redirect('home');
        }
        return redirect('login');
    }
}
