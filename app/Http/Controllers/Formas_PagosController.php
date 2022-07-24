<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formas_pagos;

class Formas_PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formaspagos = Formas_pagos::where('status',1)
        ->orderBy('nombre')->get();

        return view('Formas_Pagos.index')->with('formaspagos',$formaspagos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Formas_Pagos.create');
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
        Formas_Pagos::create($datos);
        return redirect('/formas_pagos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formaspagos = Formas_Pagos::find($id);
        return view('Formas_Pagos.read')->with('formaspagos',$formaspagos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formaspagos = Formas_Pagos::find($id);
        return view('Formas_Pagos.edit')->with('formaspagos',$formaspagos);
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
        $formaspagos = Formas_Pagos::find($id);
        $formaspagos->update($datos);
        return redirect('/formas_pagos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formaspagos = Formas_Pagos::find($id);
        $formaspagos->status = 0;
        $formaspagos->save();

        return redirect('/formas_pagos');
    }
}
