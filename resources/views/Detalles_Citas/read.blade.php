@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $detallecita->fecha !!}</h1>
<h2>ID: {!! $detallecita->id !!}</h2>
<h2>Fecha: {!! $detallecita->fecha !!}</h2>
<h2>Hora: {!! $detallecita->hora !!}</h2>
<h2>Total: {!! $detallecita->total !!}</h2>
<?php 
if($detallecita->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('detalles_citas') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()