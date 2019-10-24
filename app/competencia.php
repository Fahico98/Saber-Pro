<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\asignatura;

class competencia extends Model{

    protected $table = "competencia";

    protected $fillable = ['name', 'asignatura_id'];

    public function asignatura(){
        return $this->belongsTo(asignatura::class);
    }
}
