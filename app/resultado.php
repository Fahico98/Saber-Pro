<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;

class resultado extends Model
{
    //
    protected $table ="resultado_aprendizaje";

    protected $fillable = ['name', 'asignatura_id'];

    public function asignaturas()
    {
        return $this->belongsTo('ProyectIcfes\asignatura', 'asignatura_id');
    }

    public function criterios()
     {
         return $this->hasMany('ProyectIcfes\criterio');
     }


}
