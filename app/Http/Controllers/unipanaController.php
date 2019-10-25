<?php

namespace ProyectIcfes\Http\Controllers;

use ProyectIcfes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use ProyectIcfes\asignatura;
use ProyectIcfes\resultado;
use ProyectIcfes\criterio;
use ProyectIcfes\facultad;
use ProyectIcfes\programa;
use Session;
use Redirect;
use Storage;
use Input;
use DB;

class unipanaController extends Controller{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        $this->middleware('auth')->except([
            "destroy_facultad",
            "destroy_programa",
            "destroy_asignatura",
            "destroy_resultado",
            "destroy_criterio"
        ]);

        $this->middleware("EsAdmin")->only([
            "destroy_facultad",
            "destroy_programa",
            "destroy_asignatura",
            "destroy_resultado",
            "destroy_criterio"
        ]);
    }

    public function index_facultad(){
        //$request->user()->authorizeRoles(['user', 'admin']);
        //$facultades = Facultad::find(1)->get();
        $facultades = Facultad::all();
        return view('layouts.unipana.facultades.index', compact('facultades'));
    }

    public function index_programa(){
        $programas = Programa::with('facultad')->get();
        //return $programas;
        return view('layouts.unipana.programas.index', compact('programas'));
    }

    public function index_asignatura(){
        $asignaturas = Asignatura::with('programa')->get();
        //return $asignaturas;
        return view('layouts.unipana.asignaturas.index', compact('asignaturas'));
    }

    public function index_resultado(){
        $resultados = Resultado::with('asignatura')->get();
        return view('layouts.unipana.resultados.index', compact('resultados'));
    }

    public function index_criterio(){
        $criterios = Criterio::with('resultado')->get();
        return view('layouts.unipana.criterios.index', compact('criterios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_facultad(){
        return view('layouts.unipana.facultades.create');
    }

    public function create_programa(){
        $facultades = Facultad::all();
        $programa = new programa;
        return view('layouts.unipana.programas.create', compact('facultades','programa'));
    }

    public function create_asignatura(){
        $programas = Programa::all();
        $asignatura = new asignatura;
        return view('layouts.unipana.asignaturas.create', compact('programas','asignatura'));
    }

    public function create_resultado(){
        $asignaturas = Asignatura::all();
        $resultado = new resultado;
        return view('layouts.unipana.resultados.create', compact('asignaturas','resultado'));
    }

    public function create_criterio(){
        $asignaturas = Asignatura::all();
        $resultados = Resultado::all();
        $criterio = new criterio;
        return view('layouts.unipana.criterios.create', compact('resultados','asignaturas','criterio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_facultad(Request $request){
        $facultad = new Facultad;
        $facultad->name = $request->name;
        $facultad->save();
        return Redirect('/unipana/facultad')->with('message','Guardado Satisfactoriamente !');
    }

    public function store_programa(Request $request){
        $programa = new Programa;
        $programa->name = $request->name;
        $programa->facultad_id = $request->facultad_id;
        $programa->save();
        return Redirect('/unipana/programa')->with('message','Guardado Satisfactoriamente !');
    }

    public function store_asignatura(Request $request){
        $asignatura = new Asignatura;
        $asignatura->name = $request->name;
        $asignatura->semestre = $request->semestre;
        $asignatura->no_creditos = $request->no_creditos;
        $asignatura->docente_encargado = $request->docente_encargado;
        $asignatura->programa_id = $request->programa_id;
        $asignatura->save();
        return Redirect('/unipana/asignatura')->with('message','Guardado Satisfactoriamente !');
    }

    public function store_resultado(Request $request){
        $resultado = new Resultado;
        $resultado->name = $request->name;
        $resultado->asignatura_id = $request->asignatura_id;
        $resultado->save();
        return Redirect('/unipana/resultado')->with('message','Guardado Satisfactoriamente !');
    }

    public function store_criterio(Request $request){
        $criterio = new Criterio;
        $criterio->name = $request->name;
        $criterio->resultado_id = $request->result_id;
        $criterio->save();
        return Redirect('/unipana/criterio')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return view('Unipana.facultad.index', compact('facultad'));
    }

    public function show_programa($id){
        return view('Unipana.programa.index', compact('programa'));
    }

    public function show_asignatura($id){
        return view('Unipana.asignaturas.index', compact('asignatura'));
    }

    public function show_resultado($id){
        return view('Unipana.resultados.index', compact('resultado'));
    }

    public function show_criterio($id){
        return view('Unipana.criterios.index', compact('criterio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_facultad($id){
        $facultad = Facultad::find($id);
        return view('layouts.unipana.facultades.edit',compact('facultad'));
    }

    public function edit_Programa($id){
        $programa = Programa::find($id);
        $facultades = Facultad::all();
        return view('layouts.unipana.programas.edit',compact('programa','facultades'));
    }

    public function edit_asignatura($id){
        $asignatura = Asignatura::find($id);
        $programas = Programa::all();
        return view('layouts.unipana.asignaturas.edit',compact('asignatura','programas'));
    }

    public function edit_resultado($id){
        $resultado = Resultado::find($id);
        $asignaturas = Asignatura::all();
        return view('layouts.unipana.resultados.edit',compact('resultado','asignaturas'));
    }

    public function edit_criterio($id){
        $criterio = Criterio::find($id);
        $resultados = Resultado::all();
        return view('layouts.unipana.criterios.edit',compact('criterio','resultados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_facultad(Request $request, $id){
        $facultad = Facultad::find($id);
        $this->validate(request(), [
            'name' => 'required',
        ]);
        $facultad->name = $request->name;
        $facultad->save();
        return Redirect('/unipana/facultad')->with('message','Guardado Satisfactoriamente !');
    }

    public function update_programa(Request $request, $id){
        $programa = Programa::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'facultad_id' => 'required',
        ]);
        $programa->name = $request->name;
        $programa->facultad_id = $request->facultad_id;
        $programa->save();
        return Redirect('/unipana/programa')->with('message','Guardado Satisfactoriamente !');
    }

    public function update_asignatura(Request $request, $id){
        $asignatura = Asignatura::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'semestre' => 'required',
            'no_creditos' => 'required',
            'docente_encargado' => 'required',
            'programa_id' => 'required',
        ]);
        $asignatura->name = $request->name;
        $asignatura->semestre = $request->semestre;
        $asignatura->no_creditos = $request->no_creditos;
        $asignatura->docente_encargado = $request->docente_encargado;
        $asignatura->programa_id = $request->programa_id;
        $asignatura->save();
        return Redirect('/unipana/asignatura')->with('message','Guardado Satisfactoriamente !');
    }

    public function update_resultado(Request $request, $id){
        $resultado = Resultado::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'asignatura_id' => 'required',
        ]);
        $resultado->name = $request->name;
        $resultado->asignatura_id = $request->asignatura_id;
        $resultado->save();
        return Redirect('/unipana/resultado')->with('message','Guardado Satisfactoriamente !');
    }

    public function update_criterio(Request $request, $id){
        $criterio = Criterio::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'result_id' => 'required',
        ]);
        $criterio->name = $request->name;
        $criterio->result_id = $request->result_id;
        $criterio->save();
        return Redirect('/unipana/criterio')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_facultad($id){
        $facultad = Facultad::find($id);
        $facultad->delete();
        return redirect('/unipana/facultad');
    }

    public function destroy_programa($id){
        $programa = Programa::find($id);
        $programa->delete();
        return redirect('/unipana/programa');
    }

    public function destroy_asignatura($id){
        $asignatura = Asignatura::find($id);
        $asignatura->delete();
        return redirect('/unipana/asignatura');
    }

    public function destroy_resultado($id){
        $resultado = Resultado::find($id);
        $resultado->delete();
        return redirect('/unipana/resultado');
    }

    public function destroy_criterio($id){
        $criterio = Criterio::find($id);
        $criterio->delete();
        return redirect('/unipana/criterio');
    }
}
