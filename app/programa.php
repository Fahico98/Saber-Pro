<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;

class programa extends Model
{
    //
    protected $table ="programa";

    protected $fillable = ['name', 'facultad_id'];

    public function facultades()
    {
        return $this->belongsTo('ProyectIcfes\facultad','facultad_id');
    }

    public function asignaturas()
     {
         return $this->hasMany('ProyectIcfes\asignatura');
     }
}
