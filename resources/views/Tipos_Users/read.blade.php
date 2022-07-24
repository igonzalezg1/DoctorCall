@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $tipouser->nombre !!}</h1>
<h2>ID: {!! $tipouser->id !!}</h2>
<h2>Nombre: {!! $tipouser->nombre !!}</h2>
<h2>Rango: {!! $tipouser->rango !!}</h2>
<?php 
if($tipouser->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('tipos_users') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()