<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\resultado;
use ProyectIcfes\evidencia;

class criterio extends Model{

    protected $table ="criterio";

    protected $fillable = ['name', 'result_id'];

    public function resultado(){
        return $this->belongsTo(resultado::class);
    }

    public function evidencias(){
        return $this->belongsToMany(evidencia::class);
    }
}
