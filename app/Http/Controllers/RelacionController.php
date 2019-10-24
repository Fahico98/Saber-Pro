<?php

namespace ProyectIcfes\Http\Controllers;

use ProyectIcfes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use ProyectIcfes\Http\Requests;
use Illuminate\Http\Request;
use ProyectIcfes\facultad;
use ProyectIcfes\programa;
use ProyectIcfes\asignatura;
use ProyectIcfes\resultado;
use ProyectIcfes\criterio;
use ProyectIcfes\relacion;
use ProyectIcfes\evidencia;
use Session;
use Redirect;
use Storage;
use Input;
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

        /*
        $asignaturas =
            DB::table('asignatura')
                ->where('asignatura.id', $id)
                ->join('resultado_aprendizaje', 'asignatura.id', '=', 'resultado_aprendizaje.asignatura_id')
                ->join('criterio_evaluacion', 'resultado_aprendizaje.id', '=', 'criterio_evaluacion.resultado_aprendizaje_id')
                ->select(
                    'asignatura.id',
                    'asignatura.name as nombre_asignatura',
                    'resultado_aprendizaje.name as resultado',
                    'criterio_evaluacion.name as criterio'
                )->get();
        */

        $asignaturas =
            DB::table('asignatura')
                ->where('asignatura.id', $id)
                ->join('resultado_aprendizaje', 'asignatura.id', '=', 'resultado_aprendizaje.asignatura_id')
                ->join('criterio_evaluacion', 'resultado_aprendizaje.id', '=', 'criterio_evaluacion.resultado_aprendizaje_id')
                ->select(
                    'asignatura.id',
                    'asignatura.name as nombre_asignatura',
                    'resultado_aprendizaje.name as resultado',
                    'criterio_evaluacion.name as criterio'
                )->get()->toArray();

                echo "<pre>";
        /*return*/print_r($asignaturas); /*view('layouts.relacion.create', compact('asignaturas'));*/
    }
}
