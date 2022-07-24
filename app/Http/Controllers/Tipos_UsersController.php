<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos_Users;

class Tipos_UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposusers = Tipos_Users::where('status',1)
        ->orderBy('nombre')->get();

        return view('Tipos_Users.index')->with('tiposusers',$tiposusers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tipos_Users.create');
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
        Tipos_Users::create($datos);
        return redirect('/tipos_users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipouser = Tipos_Users::find($id);
        return view('Tipos_Users.read')->with('tipouser',$tipouser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipouser = Tipos_Users::find($id);
        return view('Tipos_Users.edit')->with('tipouser',$tipouser);
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
        $tiposusers = Tipos_Users::find($id);
        $tiposusers->update($datos);
        return redirect('/tipos_users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiposusers = Tipos_Users::find($id);
        $tiposusers->status = 0;
        $tiposusers->save();

        return redirect('/tipos_users');
    }
}
