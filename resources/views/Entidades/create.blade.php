@extends('template.master')
@section('contenido_central')
<script>
    function validar(){
        var ok = true;
        var color_error = "#FFCCCC";
        var color_ok = "#D8FFCC";

        var nombre = document.getElementById("nombre");
        if(nombre.value == "" || /^\s+$/.test(nombre.value) || nombre.value.length > 30){
            nombre.style.backgroundColor = color_error;
            ok = false;
        }else{
        nombre.style.backgroundColor = color_ok;
        }

        var id_pais = document.getElementById("id_pais");
        if(id_pais.value == "" || /^\s+$/.test(id_pais.value) || id_pais.value.length > 10){
            id_pais.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_pais.style.backgroundColor = color_ok;
        }

        var status = document.getElementById("status");
        if(status.value == "" || /^\s+$/.test(status.value) || status.value.length > 3){
            status.style.backgroundColor = color_error;
            ok = false;
        }else{
            status.style.backgroundColor = color_ok;
        }

        if(ok == false){
            alert("Compruebe los campos en rojo");
        }

        return ok;
        
    }

</script>
<h1 align="center">Crear una nueva entidad.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['url'=>'/entidades', 'onsubmit'=>'return validar();']) !!}
    <div class="form-group">
        {!! Form::label ('nombre', 'Nombre de la entidad',['class'=>'text-muted miest']) !!}
        {!! Form::text ('nombre',null,['placeholder'=>'Ingresa el nombre de la entidad', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('id_pais', 'Clave de pais',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_pais',$paises->pluck('nombre','clave')->all(), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('status', 'Estatus de la entidad',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo'), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::submit ('Guardar entidad',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()