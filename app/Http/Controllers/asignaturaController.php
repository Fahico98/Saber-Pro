<?php

namespace ProyectIcfes\Http\Controllers;

use Illuminate\Http\Request;
use ProyectIcfes\asignatura;
use Session;
use Redirect;
use ProyectIcfes\Http\Requests;
use ProyectIcfes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

class asignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('Crud_proyecto.index');

        $asignatura = Asignatura::all();
        return view('Unipana.index', compact('asignatura', 'facultad'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

         $asignatura = Asignatura::all();
         // enviar facultad
         return view('Unipana.create', compact('asignatura'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
                //$datosAsignatura=request()->all();
        //$datosAsignatura=request()->except('_token');
        //asignatura::insert($datosAsignatura);
        //return Response()->json($datosAsignatura);
        $asignatura = new Asignatura;

        $asignatura->name_asignatura = $request->name_asignatura;
        $asignatura->semestre = $request->semestre;
        $asignatura->no_creditos = $request->no_creditos;
        $asignatura->docente_encargado = $request->docente_encargado;
        $asignatura->facultad_id = $request->facultad_id;

        $asignatura->save();


        return Redirect('Unipana')->with('message','Guardado Satisfactoriamente !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $asignatura = Asignatura::find($id_asignatura);
        return view('unipana.edit',['asignatura'=>$asignatura]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $asignatura = Asignatura::find($id_asignatura);

        $asignatura->name_asignatura = $request->name_asignatura;
        $asignatura->semestre = $request->semestre;
        $asignatura->no_creditos = $request->no_creditos;
        $asignatura->docente_encargado = $request->docente_encargado;
        $asignatura->facultad_id = $request->facultad_id;

        $asignatura->save();
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('unipana');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
