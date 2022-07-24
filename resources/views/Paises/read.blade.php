@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $pais->nombre !!}</h1>
<h2>ID: {!! $pais->id !!}</h2>
<h2>Nombre: {!! $pais->nombre !!}</h2>
<h2>Clave: {!! $pais->clave !!}</h2>
<?php 
if($pais->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('paises') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()