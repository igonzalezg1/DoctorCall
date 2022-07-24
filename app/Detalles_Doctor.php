<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles_Doctor extends Model
{
    protected $table = 'detalles_doctores';

    protected $fillable = ['descripcion','calificacion','precio_consulta',
    'id_doctor','id_consultorio','id_especialidad','status'];

    public function users(){
        return $this->belongsTo('App\Users', 'id_doctor','id');
    }

    public function consultorios(){
        return $this->belongsTo('App\Consultorios', 'id_consultorio','id');
    }

    public function especialidades(){
        return $this->belongsTo('App\Especialidades', 'id_especialidad','id');
    }
}
