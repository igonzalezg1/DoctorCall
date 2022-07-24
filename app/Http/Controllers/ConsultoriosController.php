<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipios;
use App\Entidades;
use App\Paises;
use App\Consultorios;

class ConsultoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultorios = Consultorios::where('status', 1)
                    ->orderBy('id_municipio')->orderBy('nombre')->get();
        
        return view('Consultorios.index')->with('consultorios', $consultorios);
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

        return view('Consultorios.create')->with('municipios', $municipios)->with('entidades', $entidades)->with('paises', $paises);
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
        Consultorios::create($datos);

        return redirect('/consultorios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consultorio = Consultorios::find($id);
        
        return view('Consultorios.read')->with('consultorio', $consultorio);
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
        $consultorio = Consultorios::find($id);

        return view('Consultorios.edit')->with('municipios', $municipios)->with('entidades',$entidades)
        ->with('paises',$paises)->with('consultorio',$consultorio);
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
        $consultorio = Consultorios::find($id);
        $consultorio->update($datos);

        return redirect('/consultorios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultorio = Consultorios::find($id);
        $consultorio->status = 0;
        $consultorio->save();

        return redirect('/consultorios');
    }
}
