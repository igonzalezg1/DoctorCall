@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $user->nombres !!}</h1>
<h2>ID: {!! $user->id !!}</h2>
<h2>Apellido paterno: {!! $user->ap_paterno !!}</h2>
<h2>Apellido materno: {!! $user->ap_materno !!}</h2>
<h2>Nombre(s): {!! $user->nombres !!}</h2>
<h2>Edad: {!! $user->edad !!}</h2>
<h2>Fecha de nacimiento: {!! $user->fecha_nacimiento !!}</h2>
<h2>Telefono: {!! $user->telefono !!}</h2>
<h2>Correo: {!! $user->email !!}</h2>
<h2>Direccion: {!! $user->direccion !!}</h2>
<h2>Codigo postal: {!! $user->cp !!}</h2>
<h2>Telefono: {!! $user->telefono !!}</h2>
<h2>Username: {!! $user->username !!}</h2>
<h2>Password: {!! $user->password !!}</h2>
<h2>Tipo de usuario: {!! $user->tipos_users->nombre !!}</h2>
<h2>Nombre de pais: {!! $user->paises->nombre !!}</h2>
<h2>Nombre de entidad: {!! $user->entidades->nombre !!}</h2>
<h2>Nombre de municipio: {!! $user->municipios->nombre !!}</h2>
<?php 
if($user->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('users') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()