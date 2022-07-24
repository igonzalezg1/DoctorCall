<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_Users extends Model
{
    protected $table = 'tipos_users';

    protected $fillable = ['nombre','rango','status'];
}
