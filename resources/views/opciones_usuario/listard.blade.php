@extends('template.master')
@section('contenido_central')
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            @foreach($detalles_doctores as $detalle_doctor)
            <div class="card" style="width:400px">
                <div class="card-body">
                <h4 class="card-title">
                    Nombre: 
                    {!! $detalle_doctor->users->ap_paterno !!}
                    {!! $detalle_doctor->users->ap_materno !!}
                    {!! $detalle_doctor->users->nombres !!}
                </h4>
                <p class="card-text">Descripcion: {!! $detalle_doctor->descripcion !!}</p>
                <p class="card-text">Precio por consulta: {!! $detalle_doctor->precio_consulta !!}</p>
                <p class="card-text">Calificacion: {!! $detalle_doctor->calificacion !!}</p>
                <a href="{!! asset('agencit/'.$detalle_doctor->id) !!}" class="btn btn-primary">Agendar cita</a>
                <br />
                </div>
                <img class="card-img-bottom" src="{!! asset('estilo/img/iconos/doctor.png') !!}" alt="Card image" style="width:100%">
            </div>
            @endforeach
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
@endsection()