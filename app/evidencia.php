<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\afirmacion;
use ProyectIcfes\criterio;

class evidencia extends Model{

    protected $table = "evidencia";

    protected $fillable = ['name', 'afirmacion_id'];

    public function afirmacion(){
        return $this->belongsTo(afirmacion::class);
    }

    public function criterios(){
        return $this->belongsToMany(criterio::class);
    }
}
