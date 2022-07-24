<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



///Grupo de usuarios sin logear
Route::group(['middleware'=>'web'], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('welcome', function () {
        return view('welcome');
    });

    Route::get('login','Auth\LoginController@getLogin');

	Route::post('login','Auth\LoginController@postLogin');

	Route::get('register','Auth\LoginController@getRegister');

	Route::post('register','Auth\LoginController@postRegister');
});


//Para comprobar sin accesos
Route::group(['middleware'=>'auth'], function(){

    Route::get('cerrarsession','Auth\LoginController@getLogout');
    
    Route::get('sin_acceso_doctor',function (){
        $usuarioactual = \Auth::user();
        return view("mensajes.error_acceso")->with('msj','Sin privilegios para entrar a area de doctores.')
        ->with("usuario", $usuarioactual);
    });

    Route::get('sin_acceso_normal',function (){
        $usuarioactual = \Auth::user();
        return view("mensajes.error_acceso")->with('msj','Sin privilegios para entrar a area de clientes.')
        ->with("usuario", $usuarioactual);
    });

    Route::get('sin_acceso_admin',function (){
        $usuarioactual = \Auth::user();
        return view("mensajes.error_acceso")->with('msj','Sin privilegios para entrar a area de administradores.')
        ->with("usuario", $usuarioactual);
    });

    Route::get('combo_entidades_x_pais/{id_pais}', 'AjaxController@combo_entidades_x_pais');

    Route::get('combo_municipios_x_entidad/{id_entidad}','AjaxController@combo_municipios_x_entidad');
});


//Para opciones de admin
Route::group(['middleware'=>'usuarioAdmin'], function(){

    Route::get('OpcionesAdmin', function () {
        return view('OpcionesAdmin');
    });

    //CRUDS
    Route::resource('paises', 'PaisesController');

    Route::resource('entidades', 'EntidadesController');

    Route::resource('municipios', 'MunicipiosController');

    Route::resource('consultorios', 'ConsultoriosController');

    Route::resource('especialidades', 'EspecialidadesController');

    Route::resource('formas_pagos', 'Formas_PagosController');

    Route::resource('tipos_users', 'Tipos_UsersController');

    Route::resource('users', 'UsersController');

    Route::resource('fotos_users', 'Fotos_UsersController');

    Route::resource('cedulas', 'CedulasController');

    Route::resource('citas', 'CitasController');

    Route::resource('detalles_citas', 'Detalles_CitasController');

    Route::resource('detalles_doctores', 'Detalles_DoctoresController');

});


//Para entrar a usuario comun
Route::group(['middleware'=>'usuarioNormal'], function(){

    Route::resource('opcionesusuario', 'OpcionesUsuario');

    Route::get('listaresp', 'OpcionesUsuario@mostrarespecialidades');

    Route::get('mostardoctores/{id_especialidad}', 'OpcionesUsuario@mostrardoctores_x_especialidad');

    Route::get('agencit/{id_doctor}', 'OpcionesUsuario@intentaragendar');

    Route::post('finalizar', 'OpcionesUsuario@postFinalizar');

    Route::get('editarusel', 'OpcionesUsuario@mostarDatosU');

    Route::get('vercitasu', 'OpcionesUsuario@vercitas');

});

Route::group(['middleware'=>'usuarioDoctor'], function(){

    Route::resource('OpcionesDoctor', 'OpcionesDoctor');

    Route::get('editarusd', 'OpcionesDoctor@mostarDatosU');

    Route::get('vercitasd', 'OpcionesDoctor@vercitas');

    Route::get('concluir/{id_cita}', 'OpcionesDoctor@concluir');

    Route::get('cancelar/{id_cita}', 'OpcionesDoctor@cancelar');
});
