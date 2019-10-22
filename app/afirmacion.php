<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\evidencia;
use ProyectIcfes\modulo;

class afirmacion extends Model{

    protected $table ="afirmacion";

    protected $fillable = ['name', 'modulo_id'];

    public function evidencias(){
        return $this->hasMany(evidencia::class);
    }

    public function modulo(){
        return $this->belongsTo(modulo::class);
    }
}
