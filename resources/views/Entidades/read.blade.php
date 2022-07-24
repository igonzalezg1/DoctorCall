@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $entidad->nombre !!}</h1>
<h2>ID: {!! $entidad->id !!}</h2>
<h2>Nombre: {!! $entidad->nombre !!}</h2>
<h2>Clave de pais: {!! $entidad->id_pais !!}</h2>
<?php 
if($entidad->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('entidades') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()