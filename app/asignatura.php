<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\programa;
use ProyectIcfes\resultado;
use ProyectIcfes\competencia;

class asignatura extends Model{

    protected $table = "asignatura";

    protected $fillable = ['name', 'semestre', 'no_creditos', 'docente_encargado', 'programa_id'];

    public function programa(){
        return $this->belongsTo(programa::class);
    }

    public function resultados(){
        return $this->hasMany(resultado::class);
    }

    public function competencias(){
        return $this->hasMany(competencia::class);
    }
}
