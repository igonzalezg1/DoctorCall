<?php

namespace App\Http\Controllers\Auth;

use App\Users;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;
use Session;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest')->except('getLogout');
    }

    public function getLogin()
    {
        return view ("login");
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
        ]);
        $credentials = $request->only('username','password');
        $username = $credentials['username'];
        $password = $credentials['password'];
        $usuarioactual=\Auth::user();
        if($this->auth->attempt($credentials,$request->has('remember'))){
            $usuarioactual=\Auth::user();
            return view('welcome')->with("usuario",$usuarioactual);
        }
        return view("mensajes.error_acceso")->with("msj","Usuario o password incorrectos")
        ->with('username',$username)->with('password',$password);
    }

    public function getLogout()
    {
        $this->auth->logout();
        Session::flush();

        return redirect("welcome");
    }

    public function getRegister()
    {
        return view("register");
    }

    public function postRegister(Request $request)
    {
        $data = $request->all();

        Users::create([
            'ap_paterno' => $data['ap_paterno'],
            'ap_materno' => $data['ap_materno'],
            'nombres' => $data['nombres'],
            'edad' => $data['edad'],
            'telefono' => $data['telefono'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'email' => $data['email'],
            'direccion' => $data['direccion'],
            'cp' => $data['cp'],
            'username' => $data['username'],
            //'password' => $data['password'],
            'password' => Hash::make($data['password']),
            'id_tipo_usuario' => $data['id_tipo_usuario'],
            'id_pais' => 1,
            'id_entidad' => 1,
            'id_municipio' => 1,
            'status' => 2,
        ]);

        return redirect("login");
    }
}
