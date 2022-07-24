@extends('template.master')
@section('contenido_central')
<div class=container>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h2 align="center">Bienvenido doctor {!! $usuarioactual->nombres !!}</h2>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <br />
    <div clas="row">
        <div class="col-sm-11">
            <h3>A continuacion te mostramos las opciones de usuario que puedes utilizar.</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card" style="width:400px">
                <div class="card-body">
                <h4 class="card-title">Ver tu historial de citas</h4>
                <p class="card-text">Da clic para poder ver todas tus citas</p>
                <a href="vercitasd" class="btn btn-primary">Ver citas</a>
                <br />
                <br />
                </div>
                <img class="card-img-bottom" src="{!! asset('estilo/img/iconos/citas.png') !!}" alt="Card image" style="width:100%">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card" style="width:400px">
                <div class="card-body">
                <h4 class="card-title">Actualizar tu informacion de usuario</h4>
                <p class="card-text">Da clic para poder actualizar tu informacio de usuario</p>
                <a href="editarusd" class="btn btn-primary">Actualizar la informacion</a>
                <br />
                <br />
                </div>
                <img class="card-img-bottom" src="{!! asset('estilo/img/iconos/foto_users.png') !!}" alt="Card image" style="width:100%">
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-6">
        </div>
    </div>
</div>
@endsection()