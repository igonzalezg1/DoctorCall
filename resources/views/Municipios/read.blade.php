@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $municipio->nombre !!}</h1>
<h2>ID: {!! $municipio->id !!}</h2>
<h2>Nombre: {!! $municipio->nombre !!}</h2>
<h2>Nombre de entidad: {!! $municipio->entidades->nombre !!}</h2>
<?php 
if($municipio->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('municipios') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()