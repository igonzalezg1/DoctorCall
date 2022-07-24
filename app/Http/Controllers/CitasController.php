<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citas;
use App\Formas_Pagos;
use App\Users;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('usuarioAdmin');
     }

    public function index()
    {

        $usuarioactual = \Auth::user();

        $citas = Citas::where('status', 1)
                    ->orderBy('id_cliente')->get();
        
        return view('Citas.index')->with('citas', $citas)->with('usuarioactual',$usuarioactual);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarioactual = \Auth::user();
        $clientes = Users::select('id','nombres')->where('id_tipo_usuario', 2)->orderBy('nombres')->get();
        $doctores = Users::select('id','nombres')->where('id_tipo_usuario', 1)->orderBy('nombres')->get();
        $formaspagos = Formas_Pagos::select('id','nombre')->where('status',1)->orderBy('nombre')->get();

        return view('Citas.create')->with('clientes', $clientes)->with('doctores', $doctores)->with('formaspagos', $formaspagos)
        ->with('usuarioactual',$usuarioactual);
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
        Citas::create($datos);

        return redirect('/citas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarioactual = \Auth::user();
        $cita = Citas::find($id);
        
        return view('Citas.read')->with('cita', $cita)->with('usuarioactual',$usuarioactual);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarioactual = \Auth::user();
        $clientes = Users::select('id','nombres')->where('id_tipo_usuario', 2)->orderBy('nombres')->get();
        $doctores = Users::select('id','nombres')->where('id_tipo_usuario', 1)->orderBy('nombres')->get();
        $formaspagos = Formas_Pagos::select('id','nombre')->where('status',1)->orderBy('nombre')->get();
        $cita = Citas::find($id);

        return view('Citas.edit')->with('clientes', $clientes)->with('doctores', $doctores)
        ->with('formaspagos', $formaspagos)->with('cita', $cita)->with('usuarioactual',$usuarioactual);
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
        $cita = Citas::find($id);
        $cita->update($datos);

        return redirect('/citas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Citas::find($id);
        $cita->status = 0;
        $cita->save();

        return redirect('/citas');
    }
}
