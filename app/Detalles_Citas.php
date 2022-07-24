<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles_Citas extends Model
{
    protected $table = 'detalles_citas';

    protected $fillable = ['fecha','hora','subtotal','iva','total','no_tarjeta','vencimiento','cvv','id_cita','status'];

    public function citas(){
        return $this->belongsTo('App\Citas', 'id_cita','id');
    }

    protected $casts = [
        'hora' => 'hh:mm',
    ];

}
