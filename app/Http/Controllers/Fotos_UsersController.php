<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Fotos_Users;

use Storage;
use Illuminate\Support\Facades\Validator;

class Fotos_UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotosusers = Fotos_Users::where('status',1)->orderBy('id')->get();

        return view('Fotos_Users.index')->with('fotosusers', $fotosusers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Users::select('id','nombres')->orderBy('nombres')->get();

        return view('Fotos_Users.create')->with('users', $users);
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
        $hora = date("h:i:s");
        $fecha = date("d-m-Y");
        $prefijo = $fecha."_".$hora;
        $archivo = $request->file('files');
        $input = array('file'=>$archivo);
        $reglas = array('file'=>'required|mimes:jpeg,png,gif|max:50000');
        $validacion = Validator::make($input, $reglas);
        if($validacion->fails()){
            $ruta = $prefijo.'_'.$archivo->getClientOriginalNAme();
            return view('mensajes.error_acceso')->with('msj','el archivo no es una imagen o es demasiado grande para almacenar = '.$ruta);
        }else{
            $ruta = $prefijo.'_'.$archivo->getClientOriginalNAme();
            $r1 = Storage::disk('usuarios')->put($ruta, $archivo);
            if($r1){
                $datos['ruta'] = $ruta;
                Fotos_Usuarios::create($datos);
                return redirect('/Fotos_Usuarios');
            }else{
                return view("mensajes.error_acceso")->with('msj','El archivo no se guardo, favor de consultar al administrador.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
