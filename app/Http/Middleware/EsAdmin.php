<?php

namespace ProyectIcfes\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsAdmin{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        //return $next($request);

        if(Auth::check()){
            $user = Auth::user();
            if($user->esAdmin()){
                return $next($request);
            else{
                redirect('home');
            }
        }else{
            return redirect('login');
        }
    }
}
