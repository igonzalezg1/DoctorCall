@extends('template.master')
@section('contenido_central')
<h1>Detalles de cita {!! $cita->id !!}</h1>
<h2>ID: {!! $cita->id !!}</h2>
<h2>Doctor: {!! $cita->doctores->nombres !!}</h2>
<h2>Cliente: {!! $cita->clientes->nombres !!}</h2>
<h2>Forma de pago: {!! $cita->formas_pagos->nombre !!}</h2>
<?php 
if($cita->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('citas') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()