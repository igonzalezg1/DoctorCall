<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cedulas extends Model
{
    protected $table = 'cedulas';

    protected $fillable = ['nombre','no_cedula','grado','ruta','id_doctor','status'];

    public function doctores(){
        return $this->belongsTo('App\Users', 'id_doctor','id');
    }

}
