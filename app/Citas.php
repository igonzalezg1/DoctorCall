<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $table = 'citas';

    protected $fillable = ['tipo_cita','id_cliente','id_doctor','id_forma_pago','status'];

    public function clientes(){
        return $this->belongsTo('App\Users', 'id_cliente','id');
    }

    public function doctores(){
        return $this->belongsTo('App\Users', 'id_doctor','id');
    }

    public function formas_pagos(){
        return $this->belongsTo('App\Formas_Pagos', 'id_forma_pago','id');
    }

}