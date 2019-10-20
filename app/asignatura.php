<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;

class asignatura extends Model
{
    //
    protected $table ="asignatura";

    protected $fillable = ['id', 'name', 'semestre', 'no_creditos', 'docente_encargado', 'facultad_id'];


    public function programas()
    {
        return $this->belongsTo('ProyectIcfes\programa','programa_id');
    }
    public function resultados()
     {
         return $this->hasMany('ProyectIcfes\resultado', 'asignatura_id');
     }
    public function criterios()
    {
          return $this->hasMany('ProyectIcfes\criterio');
    }
    public function relaciones()
      {
           return $this->hasMany('ProyectIcfes\relacion');
      }


}
