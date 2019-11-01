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
use ProyectIcfes\Modulo;
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

        $this->middleware('EsDocEstInv')->except([
            "show_list"
        ]);

        $this->middleware('auth')->only([
            "show_list"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_asignatura($id){
        $modulos = DB::table('modulo')->get();
        $asignaturas = DB::table('asignatura')
            ->where('asignatura.id', $id)
            ->join('resultado', 'asignatura.id', '=', 'resultado.asignatura_id')
            ->select(
                'asignatura.id',
                'asignatura.name as nombre_asignatura',
                'resultado.name as resultado',
                'resultado.id as resultado_id'
            )->get();
        if($asignaturas->count() !== 0){
            return view('layouts.relacion.create', compact('asignaturas'), compact("modulos"));
        }else{
            $asignaturas = Asignatura::with('programa')->paginate(5);
            return view('layouts.unipana.asignaturas.index', [
                "asignaturas" => $asignaturas,
                "searchBox" => ""
            ]);
        }
    }

    public function get_criterios(){
        $resultado_id = Input::get("resultado_id");
        $criterios = criterio::where("resultado_id", "=", $resultado_id)->get();
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

    public function create(Request $request){
        $criterio_id = $request->criterio;
        $evidencia_id = $request->evidencia;
        $criterio = Criterio::where("id", "=", $criterio_id)->get()->first();
        $evidencia = Evidencia::where("id", "=", $evidencia_id)->get()->first();
        $criterio->evidencias()->sync($evidencia);
        return redirect()->route("asignatura_index");
    }

    public function show_list($id){
        $relacionData = array();
        $asignatura = Asignatura::where("id", "=", $id)->select("name")->get()->first();
        $resultados = Resultado::where("asignatura_id", "=", $id)->get();
        if($resultados->count() !== 0){
            foreach($resultados as $resultado){
                $criterios = Criterio::where("resultado_id", "=", $resultado->id)->get();
                if($criterios->count() !== 0){
                    foreach($criterios as $criterio){
                        $relaciones = Relacion::where("criterio_id", "=", $criterio->id)->get();
                        if($relaciones->count() !== 0){
                            foreach($relaciones as $relacion){
                                $evidencia = Evidencia::where("id", "=", $relacion->evidencia_id)->get()->first();
                                $afirmacion = Afirmacion::where("id", "=", $evidencia->afirmacion_id)->get()->first();
                                $modulo = Modulo::where("id", "=", $afirmacion->modulo_id)->get()->first();
                                array_push($relacionData, array(
                                    "asignatura"    => $asignatura->name,
                                    "resultado"     => $resultado->name,
                                    "criterio"      => $criterio->name,
                                    "evidencia"     => $evidencia->name,
                                    "afirmacion"    => $afirmacion->name,
                                    "modulo"        => $modulo->name
                                ));
                            }
                        }
                    }
                }
            }
        }
        if(count($relacionData) !== 0){
            return view("layouts.relacion.list", compact("id"), compact("relacionData"));
        }else{
            return redirect()->route("asignatura_index");
        }
    }
}
