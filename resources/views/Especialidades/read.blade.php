@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $especialidad->nombre !!}</h1>
<h2>ID: {!! $especialidad->id !!}</h2>
<h2>Nombre: {!! $especialidad->nombre !!}</h2>
<h2>Descripcion: {!! $especialidad->descripcion !!}</h2>
<?php 
if($especialidad->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('especialidades') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()