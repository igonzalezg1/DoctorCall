<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formas_Pagos extends Model
{
    protected $table = 'formas_pagos';

    protected $fillable = ['nombre','status'];
}
