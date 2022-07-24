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

        var id_entidad = document.getElementById("id_entidad");
        if(id_entidad.value == "" || /^\s+$/.test(id_entidad.value) || id_entidad.value.length > 10){
            id_entidad.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_entidad.style.backgroundColor = color_ok;
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
<h1 align="center">Editar municipio {!! $municipio->nombre !!}.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['method'=>'PATCH', 'url'=>'/municipios/'.$municipio->id, 'onsubmit'=>'return validar();']) !!}
    <div class="form-group">
        {!! Form::label ('nombre', 'Nombre del municipio',['class'=>'text-muted miest']) !!}
        {!! Form::text ('nombre',$municipio->nombre,['placeholder'=>'Ingresa el nombre de la entidad','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('id_entidad', 'Nombre de entidad',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_entidad',$entidades->pluck('nombre','id')->all(), $municipio->id_entidad, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('status', 'Estatus del municipio',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo'), $municipio->status, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::submit ('Guardar municipio',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()