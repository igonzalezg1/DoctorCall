<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidades;
use App\Users;
use App\Detalles_Doctor;
use App\Formas_Pagos;
use App\Paises;
use Illuminate\Support\Facades\Hash;
use App\Entidades;
use App\Municipios;
use App\Citas;
use App\Detalles_Citas;
use Session;

class OpcionesDoctor extends Controller
{
    public function index(){
        $usuarioactual=\Auth::user();

        return view('opciones_doctor.index')
        ->with('usuarioactual', $usuarioactual);
    }

    public function mostarDatosU()
    {
        $user = \Auth::user();
        $municipios = Municipios::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $entidades = Entidades::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $paises = Paises::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();

        return view ('opciones_doctor.editaru')->with('municipios', $municipios)->with('entidades', $entidades)
        ->with('paises', $paises)->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $user = Users::find($id);
        $user->update([
            'ap_paterno' => $datos['ap_paterno'],
            'ap_materno' => $datos['ap_materno'],
            'nombres' => $datos['nombres'],
            'edad' => $datos['edad'],
            'telefono' => $datos['telefono'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
            'email' => $datos['email'],
            'direccion' => $datos['direccion'],
            'cp' => $datos['cp'],
            'username' => $datos['username'],
            //'password' => $data['password'],
            'password' => Hash::make($datos['password']),
            'id_pais' => $datos['id_pais'],
            'id_entidad' => $datos['id_entidad'],
            'id_municipio' => $datos['id_municipio'],
            'status' => $datos['status'],
        ]);

        return redirect('/OpcionesDoctor');
    }

    public function vercitas()
    {
        $usuarioactual = \Auth::user();
        $citas = Citas::join("detalles_citas", "detalles_citas.id_cita", "=", "citas.id")
        ->where('id_doctor', $usuarioactual->id)->get();

        return view('opciones_doctor.mostrarc')->with('citas', $citas);
    }

    public function concluir($id_cita){
        $cita = Citas::find($id_cita);
        $cita->update([
            'status' => 0,
        ]);

        $detalle = Detalles_Citas::find($id_cita);
        $detalle->update([
            'status' => 0,
        ]);

        return redirect('/OpcionesDoctor');
    }

    public function cancelar($id_cita){
        $cita = Citas::find($id_cita);
        $cita->update([
            'status' => 2,
        ]);

        $detalle = Detalles_Citas::find($id_cita);
        $detalle->update([
            'status' => 2,
        ]);

        return redirect('/OpcionesDoctor');
    }
}
