<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = ['ap_paterno','ap_materno','nombres','edad','telefono','fecha_nacimiento','email'
    ,'direccion','cp','username','password','id_tipo_usuario','id_municipio',
    'id_entidad','id_pais','status'];

    public function tipos_users(){
        return $this->belongsTo('App\Tipos_Users', 'id_tipo_usuario','id');
    }

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