@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $consultorio->nombre !!}</h1>
<h2>ID: {!! $consultorio->id !!}</h2>
<h2>Nombre: {!! $consultorio->nombre !!}</h2>
<h2>Direccion: {!! $consultorio->direccion !!}</h2>
<h2>Codigo postal: {!! $consultorio->cp !!}</h2>
<h2>Telefono: {!! $consultorio->telefono !!}</h2>
<h2>Nombre de pais: {!! $consultorio->paises->nombre !!}</h2>
<h2>Nombre de entidad: {!! $consultorio->entidades->nombre !!}</h2>
<h2>Nombre de municipio: {!! $consultorio->municipios->nombre !!}</h2>
<?php 
if($consultorio->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('consultorios') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()