<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Detalles_Doctor;
use App\Consultorios;
use App\Especialidades;

class Detalles_DoctoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallesdoctores = Detalles_Doctor::where('status', 1)->get();
        
        return view('Detalles_Doctores.index')->with('detallesdoctores', $detallesdoctores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctores = Users::select('id','nombres')->where('id_tipo_usuario', 1)->get();
        $consultorios = Consultorios::select('id','nombre')->where('status', 1)->get();
        $especialidades = Especialidades::select('id','nombre')->where('status', 1)->get();

        return view('Detalles_Doctores.create')->with('doctores', $doctores)->with('consultorios', $consultorios)
        ->with('especialidades', $especialidades);
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
        Detalles_Doctor::create($datos);

        return redirect('/detalles_doctores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalledoctor = Detalles_Doctor::find($id);
        
        return view('Detalles_Doctores.read')->with('detalledoctor', $detalledoctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctores = Users::select('id','nombres')->where('id_tipo_usuario', 1)->get();
        $consultorios = Consultorios::select('id','nombre')->where('status', 1)->get();
        $especialidades = Especialidades::select('id','nombre')->where('status', 1)->get();
        $detalledoctor = Detalles_Doctor::find($id);

        return view('Detalles_Doctores.edit')->with('doctores', $doctores)->with('consultorios', $consultorios)
        ->with('especialidades', $especialidades)->with('detalledoctor',$detalledoctor);
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
        $detalledoctor = Detalles_Doctor::find($id);
        $detalledoctor->update($datos);

        return redirect('/detalles_doctores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalledoctor = Detalles_Doctor::find($id);
        $detalledoctor->status = 0;
        $detalledoctor->save();

        return redirect('/detalles_doctores');
    }
}
