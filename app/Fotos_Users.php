<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fotos_Users extends Model
{
    protected $table = 'fotos_users';

    protected $fillable = ['ruta','id_user','status'];

    public function users(){
        return $this->belongsTo('App\Users', 'id_user','id');
    }
    
}
