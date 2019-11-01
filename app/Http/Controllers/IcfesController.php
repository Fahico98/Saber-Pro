<?php

namespace ProyectIcfes\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use ProyectIcfes\modulo;
use ProyectIcfes\afirmacion;
use ProyectIcfes\evidencia;
use Session;
use Redirect;
use ProyectIcfes\Http\Requests;
use ProyectIcfes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Storage;

class IcfesController extends Controller{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        $this->middleware('auth')->except([
            "index_modulo",
            "index_afirmacion",
            "index_evidencia",
            "show_modulo",
            "show_afirmacion",
            "show_evidencia"
        ]);

        $this->middleware('EsAdmin')->only([
            "destroy_modulo",
            "destroy_afirmacion",
            "destroy_evidencia"
        ]);

        $this->middleware("EsDocEstInv")->only([
            "create_modulo",
            "create_afirmacion",
            "create_evidencia",
            "store_modulo",
            "store_afirmacion",
            "store_evidencia",
            "edit_modulo",
            "edit_afirmacion",
            "edit_evidencia",
            "update_modulo",
            "update_afirmacion",
            "update_evidencia",
            "get_afirmaciones"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_modulo(){
        $modulos = Modulo::all();
        return view('layouts.icfes.modulo.index', compact('modulos'));
    }

    public function index_afirmacion(){
        $afirmaciones = Afirmacion::with('modulo')->get();
        return view('layouts.icfes.afirmaciones.index', compact('afirmaciones'));
    }

    public function index_evidencia(){
        $evidencias = Evidencia::with('afirmacion')->get();
        return view('layouts.icfes.evidencias.index', compact('evidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_modulo(){
        return view('layouts.icfes.modulo.create');
    }

    public function create_afirmacion(){
        $modulos = Modulo::all();
        $afirmacion = new afirmacion;
        return view('layouts.icfes.afirmaciones.create', compact('modulos','afirmacion'));
    }

    public function create_evidencia(){
        $modulos = Modulo::all();
        $evidencia = new evidencia;
        return view('layouts.icfes.evidencias.create', compact('modulos','evidencia'));
    }

    public function get_afirmaciones(){
        $modulo_id = Input::get("modulo_id");
        $afirmaciones = Afirmacion::where("modulo_id", "=", $modulo_id)->get();
        return response()->json($afirmaciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_modulo(Request $request){
        $modulo = new Modulo;
        $modulo->name = $request->name;
        $modulo->save();
        return Redirect('/icfes/modulo')->with('message','Guardado Satisfactoriamente !');
    }

    public function store_afirmacion(Request $request){
        $afirmacion = new Afirmacion;
        $afirmacion->name = $request->name;
        $afirmacion->modulo_id = $request->modulo_id;
        $afirmacion->save();
        return Redirect('/icfes/afirmacion')->with('message','Guardado Satisfactoriamente !');
    }

    public function store_evidencia(Request $request){
        $evidencia = new Evidencia;
        $evidencia->name = $request->name;
        $evidencia->afirmacion_id = $request->afirmacion_id;
        $evidencia->save();
        return Redirect('/icfes/evidencia')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_modulo($id){
        return view('icfes.modulo.index', compact('modulo'));
    }

    public function show_afirmacion($id){
        return view('icfes.afirmacion.index', compact('afirmacion'));
    }

    public function show_evidencia($id){
        return view('icfes.evidencias.index', compact('evidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_modulo($id){
        $modulo = Modulo::find($id);
        return view('layouts.icfes.modulo.edit',compact('modulo'));
    }

    public function edit_afirmacion($id){
        $afirmacion = Afirmacion::find($id);
        $modulos = Modulo::all();
        return view('layouts.icfes.afirmaciones.edit',compact('afirmacion','modulos'));
    }

    public function edit_evidencia($id){
        $evidencia = Evidencia::find($id);
        $modulos = Modulo::all();
        $modulo_selected = $evidencia->afirmacion->modulo;
        $modulo_selected_name = $modulo_selected->name;
        $afirmaciones = Afirmacion::where("modulo_id", "=", $modulo_selected->id)->get();
        $afirmacion_selected_name = $evidencia->afirmacion->name;
        return view('layouts.icfes.evidencias.edit', compact(
            'evidencia',
            'modulos',
            'modulo_selected_name',
            'afirmaciones',
            'afirmacion_selected_name'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_modulo(Request $request, $id){
        $modulo = Modulo::find($id);
        $this->validate(request(), [
            'name' => 'required',
        ]);
        $modulo->name = $request->name;
        $modulo->save();
        return Redirect('/icfes/modulo')->with('message','Guardado Satisfactoriamente !');
    }

    public function update_afirmacion(Request $request, $id){
        $afirmacion = Afirmacion::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'modulo_id' => 'required',
        ]);
        $afirmacion->name = $request->name;
        $afirmacion->modulo_id = $request->modulo_id;
        $afirmacion->save();
        return Redirect('/icfes/afirmacion')->with('message','Guardado Satisfactoriamente !');
    }

    public function update_evidencia(Request $request, $id){
        $evidencia = Evidencia::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'afirmacion_id' => 'required',
        ]);
        $evidencia->name = $request->name;
        $evidencia->afirmacion_id = $request->afirmacion_id;
        $evidencia->save();
        return Redirect('/icfes/evidencia')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_modulo($id){
        $modulo = Modulo::find($id);
        $modulo->delete();
        return redirect('/icfes/modulo');
    }

    public function destroy_afirmacion($id){
        $afirmacion = Afirmacion::find($id);
        $afirmacion->delete();
        return redirect('/icfes/afirmacion');
    }

    public function destroy_evidencia($id){
        $evidencia = Evidencia::find($id);
        $evidencia->delete();
        return redirect('/icfes/evidencia');
    }
}
