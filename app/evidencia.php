<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;

class evidencia extends Model
{
    //
    protected $table ="evidencia";
   protected $fillable = ['name', 'afirmacion_id'];


   public function afirmaciones()
   {
       return $this->belongsTo('ProyectIcfes\afirmacion','afirmacion_id');
   }

   public function relaciones()
   {
        return $this->belongsTo('ProyectIcfes\relacion');
    }




}
