<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\asignatura;
use ProyectIcfes\criterio;

class resultado extends Model{

    protected $table = "resultado";

    protected $fillable = ['name', 'asignatura_id'];

    public function asignatura(){
        return $this->belongsTo(asignatura::class);
    }

    public function criterios(){
        return $this->hasMany(criterio::class);
    }
}
