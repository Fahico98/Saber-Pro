<?php

namespace ProyectIcfes\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use ProyectIcfes\User;

class BladeCustomDirectivesServiceProvider extends ServiceProvider{

    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){

        Blade::if("isadmin", function(){
            return (Auth::user()) ? (Auth::user()->role->name === "administrador") : false;
        });

        Blade::if("isDIE", function(){
            return (Auth::user()) ? (Auth::user()->role->name === "doc-inv-est") : false;
        });

        Blade::if("isAdminOrDIE", function(){
            return (Auth::user()) ? (Auth::user()->role->name === "administrador" || Auth::user()->role->name === "doc-inv-est") : false;
        });

        Blade::if("isvisitante", function(){
            return (Auth::user()) ? (Auth::user()->role->name === "visitante"): false;
        });
    }
}
