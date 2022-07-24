@extends('template.master')
@section('contenido_central')
<script>
    function llenar_entidades(id_pais){
        $("#id_entidad").empty();
        var asset = '{{ asset('') }}';
        var ruta = asset+'combo_entidades_x_pais/'+id_pais;
        $.ajax({
            type:'GET',
            url:ruta,

            success:function(data){
                var entidades = data;
                for(var i = 0; i< entidades.length; i++){
                    $('#id_entidad').append('<option value="'+entidades[i].id+'">'+ entidades[i].nombre+'</option>');
                }
            }
        });
    }

    function llenar_municipios(id_entidad){
        $("#id_municipio").empty();
        var asset = '{{ asset('') }}';
        var ruta = asset+'combo_municipios_x_entidad/'+id_entidad;
        $.ajax({
            type:'GET',
            url:ruta,

            success:function(data){
                var municipios = data;
                for(var i = 0; i< municipios.length; i++){
                    $('#id_municipio').append('<option value="'+municipios[i].id+'">'+ municipios[i].nombre+'</option>');
                }
            }
        });
    }

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

        var direccion = document.getElementById("direccion");
        if(direccion.value == "" || /^\s+$/.test(direccion.value) || direccion.value.length > 50){
            direccion.style.backgroundColor = color_error;
            ok = false;
        }else{
            direccion.style.backgroundColor = color_ok;
        }

        var cp = document.getElementById("cp");
        if(cp.value == "" || /^\s+$/.test(cp.value) || cp.value.length > 5){
            cp.style.backgroundColor = color_error;
            ok = false;
        }else{
            cp.style.backgroundColor = color_ok;
        }

        var telefono = document.getElementById("telefono");
        if(telefono.value == "" || /^\s+$/.test(telefono.value) || telefono.value.length > 10){
            telefono.style.backgroundColor = color_error;
            ok = false;
        }else{
            telefono.style.backgroundColor = color_ok;
        }

        var id_pais = document.getElementById("id_pais");
        if(id_pais.value == "" || /^\s+$/.test(id_pais.value) || id_pais.value.length > 10){
            id_pais.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_pais.style.backgroundColor = color_ok;
        }

        var id_entidad = document.getElementById("id_entidad");
        if(id_entidad.value == "" || /^\s+$/.test(id_entidad.value) || id_entidad.value.length > 10){
            id_entidad.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_entidad.style.backgroundColor = color_ok;
        }

        var id_municipio = document.getElementById("id_municipio");
        if(id_municipio.value == "" || /^\s+$/.test(id_municipio.value) || id_municipio.value.length > 10){
            id_municipio.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_municipio.style.backgroundColor = color_ok;
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
<h1 align="center">Crear un nuevo consultorio.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['url'=>'/consultorios', 'onsubmit'=>'return validar();']) !!}
    <div class="form-group">
        {!! Form::label ('nombre', 'Nombre del consultorio',['class'=>'text-muted miest']) !!}
        {!! Form::text ('nombre',null,['placeholder'=>'Ingresa el nombre del consultorio', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('direccion', 'Direccion del consultorio',['class'=>'text-muted miest']) !!}
        {!! Form::text ('direccion',null,['placeholder'=>'Ingresa la direccion del consultorio', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('cp', 'Codigo postal del consultorio',['class'=>'text-muted miest']) !!}
        {!! Form::number ('cp',null,['placeholder'=>'Ingresa el codigo postal del consultorio', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('telefono', 'Telefono del consultorio',['class'=>'text-muted miest']) !!}
        {!! Form::number ('telefono',null,['placeholder'=>'Ingresa el telefono del consultorio', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('id_pais', 'Nombre de pais',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_pais',$paises->pluck('nombre','id')->all(), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control', 'onchange'=>'llenar_entidades(this.value);']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_entidad', 'Nombre de entidad',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_entidad',array(''=>'seleccionar...'), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control', 'onchange'=>'llenar_municipios(this.value);']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_municipio', 'Nombre de municipio',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_municipio',array(''=>'seleccionar...'), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('status', 'Estatus del consultorio',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo'), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::submit ('Guardar consultorio',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()