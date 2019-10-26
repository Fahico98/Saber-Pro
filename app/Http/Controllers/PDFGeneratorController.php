<?php

namespace ProyectIcfes\Http\Controllers;

use Illuminate\Http\Request;
use ProyectIcfes\Resultado;
use ProyectIcfes\Asignatura;
use ProyectIcfes\Criterio;
use ProyectIcfes\Relacion;
use ProyectIcfes\Evidencia;
use ProyectIcfes\Afirmacion;
use ProyectIcfes\Modulo;
use PDF;

class PDFGeneratorController extends Controller{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function generate_report($id){
        $pdf_data = array();
        $name_asignatura = Asignatura::where("id", "=", $id)->select("name")->get()->first();
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
                                array_push($pdf_data, array(
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
        $pdf = PDF::loadView('report_pdf', [
            "pdf_data" => $pdf_data,
            "name_asignatura" => $name_asignatura
        ])->setPaper('A4', 'landscape');
        return $pdf->download('informe.pdf');
    }

}
