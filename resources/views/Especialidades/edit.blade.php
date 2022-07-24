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

        var descripcion = document.getElementById("descripcion");
        if(descripcion.value == "" || /^\s+$/.test(descripcion.value) || descripcion.value.length > 50){
            descripcion.style.backgroundColor = color_error;
            ok = false;
        }else{
            descripcion.style.backgroundColor = color_ok;
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
<h1 align="center">Editar Especialidad {!! $especialidad->nombre !!}.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['method'=>'PATCH', 'url'=>'/especialidades/'.$especialidad->id, 'onsubmit'=>'return validar();']) !!}
    <div class="form-group">
        {!! Form::label ('nombre', 'Nombre de la especialidad',['class'=>'text-muted miest']) !!}
        {!! Form::text ('nombre',$especialidad->nombre,['placeholder'=>'Ingresa el nombre de la especialidad', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('descripcion', 'Descripcion de la especialidad',['class'=>'text-muted miest']) !!}
        {!! Form::textarea ('descripcion',$especialidad->descripcion,['placeholder'=>'Ingresa la descripcion', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('status', 'Estatus de la especialidad',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo'), $especialidad->status, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::submit ('Guardar especialidad',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()