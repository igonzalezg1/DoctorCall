<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paises;
use App\Entidades;
use App\Municipios;
use App\Tipos_Users;
use App\Consultorios;
use App\Especialidades;
use Illuminate\Support\Facades\Hash;
use App\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::orderBy('nombres')->get();
        
        return view('Users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = Municipios::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $entidades = Entidades::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $paises = Paises::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $tiposusers = Tipos_Users::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();

        return view('Users.create')->with('municipios', $municipios)->with('entidades', $entidades)
        ->with('paises', $paises)->with('tiposusers', $tiposusers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->all(); 
        Users::create([
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
            'id_tipo_usuario' => $datos['id_tipo_usuario'],
            'id_pais' => $datos['id_pais'],
            'id_entidad' => $datos['id_entidad'],
            'id_municipio' => $datos['id_municipio'],
            'status' => $datos['status'],
        ]);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::find($id);
        
        return view('Users.read')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipios = Municipios::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $entidades = Entidades::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $paises = Paises::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $tiposusers = Tipos_Users::select('id','nombre')->where('status', 1)->orderBy('nombre')->get();
        $user = Users::find($id);

        return view('Users.edit')->with('municipios', $municipios)->with('entidades', $entidades)
        ->with('paises', $paises)->with('tiposusers', $tiposusers)->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'id_tipo_usuario' => $datos['id_tipo_usuario'],
            'id_pais' => $datos['id_pais'],
            'id_entidad' => $datos['id_entidad'],
            'id_municipio' => $datos['id_municipio'],
            'status' => $datos['status'],
        ]);

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->status = 0;
        $user->save();

        return redirect('/users');
    }
}
