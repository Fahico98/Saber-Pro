<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\resultado;
use ProyectIcfes\evidencia;

class criterio extends Model{

    protected $table ="criterio_evaluacion";

    protected $fillable = ['name', 'result_id'];

    public function resultado_aprendizaje(){
        return $this->belongsTo(resultado::class);
    }

    public function evidencias(){
        return $this->belongsToMany(evidencia::class);
    }
}
