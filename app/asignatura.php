<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\programa;
use ProyectIcfes\resultado;
//use ProyectIcfes\competencia;

class asignatura extends Model{

    protected $table ="asignatura";

    protected $fillable = ['id', 'name', 'semestre', 'no_creditos', 'docente_encargado', 'facultad_id'];

    public function programa(){
        return $this->belongsTo(programa::class);
    }

    public function resultados(){
        return $this->hasMany(resultado::class);
    }

    public function criterios(){
        return $this->hasMany('ProyectIcfes\criterio');
    }

    public function relaciones(){
        return $this->hasMany('ProyectIcfes\relacion');
    }
}
