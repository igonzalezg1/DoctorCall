@extends('template.master')
@section('contenido_central')
<h1 align="center">Crear una foto de usuario.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['url'=>'/fotos_users', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label ('id_user', 'Nombre de usuario',['class'=>'text-muted miest']) !!}
        {!! Form::select ('id_user',$users->pluck('nombres','id')->all(), null, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('files', 'Foto de usuario (png, jpg, gif)',['class'=>'text-muted miest']) !!}
        {!! Form::File ('files', null, ['class'=>'form-control-file border']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('status', 'Estatus de la foto',['class'=>'text-muted miest']) !!}
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo'), null, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::submit ('Guardar foto',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()