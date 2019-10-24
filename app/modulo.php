<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\afirmacion;

class modulo extends Model{

    protected $table = "modulo_icfes";

    protected $fillable = ['name'];

    public function afirmaciones(){
        return $this->hasMany(afirmacion::class);
    }
}
