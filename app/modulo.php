<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;

class modulo extends Model
{
    //
    protected $table ="modulo_icfes";
    protected $fillable = ['name'];

    public function evidencias()
     {
         return $this->hasMany('ProyectIcfes\afirmacion');
     }
}
