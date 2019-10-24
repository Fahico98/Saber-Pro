<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\facultad;
use ProyectIcfes\asignatura;

class programa extends Model{

    protected $table ="programa";

    protected $fillable = ['name', 'facultad_id'];

    public function facultad(){
        return $this->belongsTo(facultad::class);
    }

    public function asignaturas(){
        return $this->hasMany(asignatura::class);
    }
}
