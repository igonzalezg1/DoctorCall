<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultorios extends Model
{
    protected $table = 'consultorios';

    protected $fillable = ['nombre','direccion','cp','telefono','id_pais','id_entidad','id_municipio','status'];

    public function municipios(){
        return $this->belongsTo('App\Municipios', 'id_municipio','id');
    }

    public function entidades(){
        return $this->belongsTo('App\Entidades', 'id_entidad','id');
    }

    public function paises(){
        return $this->belongsTo('App\Paises', 'id_pais','id');
    }
    
}
