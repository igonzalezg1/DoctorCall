@extends('template.master')
@section('contenido_central')
<h1>Detalles de doctor {!! $detalledoctor->users->nombres !!}</h1>
<h2>ID: {!! $detalledoctor->id !!}</h2>
<h2>Nombre doctor: {!! $detalledoctor->users->nombres !!}</h2>
<h2>Descripcion: {!! $detalledoctor->descripcion !!}</h2>
<h2>Calificacion: {!! $detalledoctor->calificacion !!}</h2>
<h2>Precio por consulta: ${!! $detalledoctor->precio_consulta !!}</h2>
<h2>Nombre de consultorio: {!! $detalledoctor->consultorios->nombre !!}</h2>
<h2>Nombre de especialidad: {!! $detalledoctor->especialidades->nombre !!}</h2>
<?php 
if($detalledoctor->status == 1){
    echo("<h2>Status: Activo</h2>");
}else{
    echo("<h2>Status: Inactivo</h2>");
}
?>

<br />
<a href="{!! asset('detalles_doctores') !!}" class="btn btn-outline-success btn-block">Regresar</a>
@endsection()