@extends('template.master')
@section('contenido_central')
<script>
        function validar(){
        var ok = true;
        var color_error = "#FFCCCC";
        var color_ok = "#D8FFCC";

        var descripcion = document.getElementById("descripcion");
        if(descripcion.value == "" || /^\s+$/.test(descripcion.value) || descripcion.value.length > 30){
            descripcion.style.backgroundColor = color_error;
            ok = false;
        }else{
            descripcion.style.backgroundColor = color_ok;
        }

        var calificacion = document.getElementById("calificacion");
        if(calificacion.value == "" || /^\s+$/.test(calificacion.value) || calificacion.value.length > 50){
            calificacion.style.backgroundColor = color_error;
            ok = false;
        }else{
            calificacion.style.backgroundColor = color_ok;
        }

        var precio_consulta = document.getElementById("precio_consulta");
        if(precio_consulta.value == "" || /^\s+$/.test(precio_consulta.value) || precio_consulta.value.length > 10){
            precio_consulta.style.backgroundColor = color_error;
            ok = false;
        }else{
            precio_consulta.style.backgroundColor = color_ok;
        }

        var id_doctor = document.getElementById("id_doctor");
        if(id_doctor.value == "" || /^\s+$/.test(id_doctor.value) || id_doctor.value.length > 10){
            id_doctor.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_doctor.style.backgroundColor = color_ok;
        }

        var id_consultorio = document.getElementById("id_consultorio");
        if(id_consultorio.value == "" || /^\s+$/.test(id_consultorio.value) || id_consultorio.value.length > 10){
            id_consultorio.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_consultorio.style.backgroundColor = color_ok;
        }

        var no_tarjeta = document.getElementById("id_especialidad");
        if(no_tarjeta.value == "" || /^\s+$/.test(no_tarjeta.value) || no_tarjeta.value.length > 16){
            no_tarjeta.style.backgroundColor = color_error;
            ok = false;
        }else{
            no_tarjeta.style.backgroundColor = color_ok;
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
<h1 align="center">Crear un detalle de doctor.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['url'=>'/detalles_doctores', 'onsubmit'=>'return validar();']) !!}
    <div class="form-group">
        {!! Form::label ('descripcion', 'Descripcion del doctor',['class'=>'text-muted miest']) !!}
        {!! Form::textarea ('descripcion',null,['placeholder'=>'Ingresa la descripcion','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('calificacion', 'Calificacion del doctor',['class'=>'text-muted miest']) !!}
        {!! Form::number ('calificacion',null,['placeholder'=>'Ingresa la calificacion', 'class'=>'form-control', 'step'=>'any']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('precio_consulta', 'Precio por consulta',['class'=>'text-muted miest']) !!}
        {!! Form::number ('precio_consulta',null,['placeholder'=>'Ingresa el precio', 'class'=>'form-control', 'step'=>'any']) !!}
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_doctor', 'Nombre del doctor',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_doctor',$doctores->pluck('nombres','id')->all(), null, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_consultorio', 'Nombre del consultorio',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_consultorio',$consultorios->pluck('nombre','id')->all(), null, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_especialidad', 'Nombre de la especialidad',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_especialidad',$especialidades->pluck('nombre','id')->all(), null, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('status', 'Estatus del detalle del doctor',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo'), null, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::submit ('Guardar detalles de doctor',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()