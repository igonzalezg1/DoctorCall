<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidades;
use App\Municipios;

class AjaxController extends Controller
{
    public function combo_entidades_x_pais($id_pais){
        $entidades = Entidades::select('id','nombre')->where('id_pais',$id_pais)->where('status',1)->get();

        return $entidades;
    }

    public function combo_municipios_x_entidad($id_entidad){
        $municipios = Municipios::select('id','nombre')->where('id_entidad',$id_entidad)->where('status',1)->get();

        return $municipios;
    }
}
