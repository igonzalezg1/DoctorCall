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

class OpcionesUsuario extends Controller
{

    public function index(){
        $usuarioactual=\Auth::user();

        return view('opciones_usuario.index')
        ->with('usuarioactual', $usuarioactual);
    }

    public function mostrarespecialidades(){
        $especialidades = Especialidades::where('status',1)->get();

        return view('opciones_usuario.listar')->with('especialidades', $especialidades);
    }

    public function mostrardoctores_x_especialidad($id_especialidad){
        $detalles_doctores = Detalles_Doctor::where('status',1)
        ->where('id_especialidad', $id_especialidad)->orderBy('id_doctor')->get();

        return view('opciones_usuario.listard')
        ->with('detalles_doctores', $detalles_doctores);
    }

    public function intentaragendar($id){

        $usuarioactual=\Auth::user();

        $formas_pagos = Formas_Pagos::where('status',1)->get();
        
        $doctor = Detalles_Doctor::find($id);

        return view('opciones_usuario.agendar')->with('usuarioactual', $usuarioactual)
        ->with('formas_pagos', $formas_pagos)
        ->with('doctor', $doctor);
    }

    public function store(Request $request)
    {
        echo 'Hola mundo';
        $data = $request->all();
        $total = $data['total'];
        $iva = $total * (.16);
        $subtotal = $total - $iva;
        $query = Citas::create([
            'tipo_cita' => $data['tipo_cita'],
            'id_cliente'=> $data['id_cliente'],
            'id_doctor' => $data['id_doctor'],
            'id_forma_pago' => $data['id_forma_pago'],
            'status' => 1,
        ]);

        $var1 =  $query->id;

        Detalles_Citas::create([
            'fecha' => $data['fecha'],
            'hora' => $data['hora'],
            'subtotal' => $subtotal,
            'iva' => $iva,
            'total' => $total,
            'no_tarjeta' => $data['no_tarjeta'],
            'cvv' => $data['cvv'],
            'vencimiento' => $data['vencimiento'],
            'id_cita' => $var1,
            'status' => 1,
        ]);

        return redirect('/opcionesusuario');
    }

    public function mostarDatosU()
    {
        $user = \Auth::user();
        $municipios = Municipios::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $entidades = Entidades::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $paises = Paises::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();

        return view ('opciones_usuario.editaru')->with('municipios', $municipios)->with('entidades', $entidades)
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

        return redirect('/opcionesusuario');
    }

    public function vercitas()
    {
        $usuarioactual = \Auth::user();
        $citas = Citas::join("detalles_citas", "detalles_citas.id_cita", "=", "citas.id")
        ->where('id_cliente', $usuarioactual->id)->get();

        return view('opciones_usuario.mostrarc')->with('citas', $citas);
    }
}
