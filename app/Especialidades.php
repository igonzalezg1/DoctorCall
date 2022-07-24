<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    protected $table = 'especialidades';

    protected $fillable = ['nombre','descripcion','status'];

}
