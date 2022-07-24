@extends('template.master')
@section('contenido_central')
<div class="container">
    <h1> Iniciar sesion</h1>
    <br />
    <br />
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="login" method="post" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="username"
                    placeholder="Ingrese el username" data-rule="minlen:4" 
                    data-msg="Capturar mas de 4 caracteres">
                </div>
                <br />
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="password"
                    placeholder="Ingrese el password" data-msg="capturar el password">
                </div>
                
                <br />
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-block">Ingresar</button>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<br />
<br />
@endsection()