<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;

class criterio extends Model{

    protected $table ="criterio_evaluacion";

    protected $fillable = ['name', 'result_id'];

    public function resultados(){
        return $this->belongsTo('ProyectIcfes\resultado', 'result_id');
    }

    public function relaciones(){
        return $this->belongsTo('ProyectIcfes\relacion');
    }
}
