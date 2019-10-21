<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;

class relacion extends Model{

    protected $table ="cirterio_evidencia";

    protected $fillable = ['criterio_id', 'evidencia_id'];

    public function criterios(){
        return $this->belongsTo('ProyectIcfes\criterio','criterio_id');
    }

    public function evidencias(){
        return $this->belongsTo('ProyectIcfes\evidencia','evidencia_id');
    }

    public function asignaturas(){
        return $this->belongsTo('ProyectIcfes\asignatura','id');
    }
}
