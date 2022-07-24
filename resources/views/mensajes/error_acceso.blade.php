@extends('template.master')
@section('contenido_central')
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card" style="width:600px">
                <div class="card-body">
                <h4 class="card-title">Error: {!! $msj !!}</h4>
                <p class="card-text text-danger">Si no ha creado su cuenta favor de crearla</p>
                <p class="card-text text-warning">Si ya ha creado su cuenta y no deja acceder a ninguna opcion esperar a ser activada (Lapso minimo a 24 horas)</p>
                </div>
                <img class="card-img-bottom" src="{!! asset('estilo/img/iconos/sad.png') !!}" alt="Card image" style="width:80%">
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
@endsection()