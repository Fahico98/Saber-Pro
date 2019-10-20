<?php

namespace ProyectIcfes\Http\Controllers;

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
use ProyectIcfes\Http\Requests;
use ProyectIcfes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Input;
use Storage;

class RelacionController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit_asignatura($id)
    {

       $asignaturas =  DB::table('asignatura')
                  ->where('asignatura.id',$id)
                  ->join('resultado_aprendizaje', 'asignatura.id', '=', 'resultado_aprendizaje.asignatura_id')
                  ->join('criterio_evaluacion', 'resultado_aprendizaje.id', '=', 'criterio_evaluacion.result_id')
                 ->select('asignatura.id', 'asignatura.name as nombre_asignatura', 'resultado_aprendizaje.name as resultado', 'criterio_evaluacion.name as criterio')

                 ->get();


      //return $asignaturas;

      return view('layouts.relacion.create', compact('asignaturas'));


    }


  }
