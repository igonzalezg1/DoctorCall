@extends('template.master')
@section('contenido_central')
<h1>Detalles de {!! $formaspagos->nombre !!}</h1>
<h2>ID: {!! $formaspagos->id !!}</h2>
<h2>Nombre: {!! $formaspagos->nombre !!}</h2>
<?php 
if($formaspagos->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('formas_pagos') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()