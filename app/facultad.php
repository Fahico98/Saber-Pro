<?php

namespace ProyectIcfes;

use Illuminate\Database\Eloquent\Model;
use ProyectIcfes\programa;

class facultad extends Model{

    protected $table = "facultad";

    protected $fillable = ['name'];

    public function programas(){
        return $this->hasMany(programa::class);
    }
}
