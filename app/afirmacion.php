<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;

class afirmacion extends Model
{
    //
    protected $table ="afirmacion";

  protected $fillable = ['name', 'modulo_id'];

 public function evidencias()
  {
      return $this->hasMany('ProyectIcfes\evidencia');
  }
  public function modulos()
  {
      return $this->belongsTo('ProyectIcfes\modulo','modulo_id');
  }
}
