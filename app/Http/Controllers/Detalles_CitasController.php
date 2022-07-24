<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalles_Citas;
use App\Citas;

class Detalles_CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallescitas = Detalles_Citas::where('status', 1)->get();
        
        return view('Detalles_Citas.index')->with('detallescitas', $detallescitas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citas = Citas::select('id')->where('status', 1)->get();

        return view('Detalles_Citas.create')->with('citas', $citas);
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
        Detalles_Citas::create($datos);

        return redirect('/detalles_citas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detallecita = Detalles_Citas::find($id);
        
        return view('Detalles_Citas.read')->with('detallecita', $detallecita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citas = Citas::select('id')->where('status', 1)->get();
        $detallecita = Detalles_Citas::find($id);

        return view('Detalles_Citas.edit')->with('citas', $citas)->with('detallecita',$detallecita);
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
        $detallecita = Detalles_citas::find($id);
        $detallecita->update($datos);

        return redirect('/detalles_citas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detallecita = Detalles_citas::find($id);
        $detallecita->status = 0;
        $detallecita->save();

        return redirect('/detalles_citas');
    }
}
