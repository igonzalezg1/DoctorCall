@extends('template.master')
@section('contenido_central')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/flag.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Paises</h4>
                <p class="card-text">Click en el boton para entrar a paises</p>
                <br />
                <a href="paises" class="btn btn-primary btn-block btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/usa.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Entidades</h4>
                <p class="card-text">Click en el boton para entrar a entidades</p>
                <a href="entidades" class="btn btn-primary btn-block btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/buildings.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Municipios</h4>
                <p class="card-text">Click en el boton para entrar a municipios</p>
                <a href="municipios" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Linea siguiente -->
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/consultorios.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Consultorios</h4>
                <p class="card-text">Click en el boton para entrar a consultorios</p>
                <a href="consultorios" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/especialidades.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Especialidades</h4>
                <p class="card-text">Click en el boton para entrar a especialidades</p>
                <a href="especialidades" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/formasPagos.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Formas de pago</h4>
                <p class="card-text">Click en el boton para entrar a formas de pago</p>
                <a href="formas_pagos" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Linea siguiente -->
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/tipos_users.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Tipos de usuarios</h4>
                <p class="card-text">Click en el boton para entrar a tipos de usuarios</p>
                <a href="tipos_users" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/users.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Usuarios</h4>
                <p class="card-text">Click en el boton para entrar a usuarios</p>
                <br />
                <a href="users" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/foto_users.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Fotos de usuarios</h4>
                <p class="card-text">Click en el boton para entrar a fotos de usuarios</p>
                <a href="fotos_users" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Linea siguiente -->
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/cedulas.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Cedulas</h4>
                <p class="card-text">Click en el boton para entrar a cedulas</p>
                <br />
                <a href="cedulas" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/citas.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Citas</h4>
                <p class="card-text">Click en el boton para entrar a citas</p>
                <br />
                <a href="citas" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/detalles_citas.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Detalles de citas</h4>
                <p class="card-text">Click en el boton para entrar a detalles de citas</p>
                <a href="detalles_citas" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="{!! asset('estilo/img/iconos/doctor.png') !!}" alt="Card image" style="width:80%">
                <div class="card-body">
                <h4 class="card-title">Detalles de doctor</h4>
                <p class="card-text">Click en el boton para entrar a detalles de doctores</p>
                <br />
                <a href="detalles_doctores" class="btn btn-primary btn-block">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div>
@endsection()