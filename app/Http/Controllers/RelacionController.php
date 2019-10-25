<?php

namespace ProyectIcfes\Http\Controllers;

use ProyectIcfes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use ProyectIcfes\Http\Requests;
use Illuminate\Http\Request;
use ProyectIcfes\facultad;
use ProyectIcfes\programa;
use ProyectIcfes\asignatura;
use ProyectIcfes\resultado;
use ProyectIcfes\criterio;
use ProyectIcfes\relacion;
use ProyectIcfes\evidencia;
use ProyectIcfes\afirmacion;
use Session;
use Redirect;
use Storage;
use DB;

class RelacionController extends Controller{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_asignatura($id){
        $modulos = DB::table('modulo_icfes')->get();
        $asignaturas = DB::table('asignatura')
            ->where('asignatura.id', $id)
            ->join('resultado_aprendizaje', 'asignatura.id', '=', 'resultado_aprendizaje.asignatura_id')
            ->select(
                'asignatura.id',
                'asignatura.name as nombre_asignatura',
                'resultado_aprendizaje.name as resultado',
                'resultado_aprendizaje.id as resultado_id'
            )->get();
        if($asignaturas->count() !== 0){
            return view('layouts.relacion.create', compact('asignaturas'), compact("modulos"));
        }else{

        }
    }

    public function get_criterios(){
        $resultado_aprendizaje_id = Input::get("resultado_id");
        $criterios = criterio::where("resultado_aprendizaje_id", "=", $resultado_aprendizaje_id)->get();
        return response()->json($criterios);
    }

    public function get_afirmaciones(){
        $modulo_icfes_id = Input::get("modulo_icfes_id");
        $afirmaciones = afirmacion::where("modulo_id", "=", $modulo_icfes_id)->get();
        return response()->json($afirmaciones);
    }

    public function get_evidencias(){
        $afirmacion_id = Input::get("afirmacion_id");
        $evidencias = evidencia::where("afirmacion_id", "=", $afirmacion_id)->get();
        return response()->json($evidencias);
    }

    public function create_relacion(){

    }
}
