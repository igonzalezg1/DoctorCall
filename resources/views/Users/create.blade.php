@extends('template.master')
@section('contenido_central')
<script>
    function validar(){
        var ok = true;
        var color_error = "#FFCCCC";
        var color_ok = "#D8FFCC";
        
        var ap_paterno = document.getElementById("ap_paterno");
        if(ap_paterno.value == "" || /^\s+$/.test(ap_paterno.value) || ap_paterno.value.length > 30){
            ap_paterno.style.backgroundColor = color_error;
            ok = false;
        }else{
            ap_paterno.style.backgroundColor = color_ok;
        }

        var ap_materno = document.getElementById("ap_materno");
        if(ap_materno.value == "" || /^\s+$/.test(ap_materno.value) || ap_materno.value.length > 30){
            ap_materno.style.backgroundColor = color_error;
            ok = false;
        }else{
            ap_materno.style.backgroundColor = color_ok;
        }

        var nombres = document.getElementById("nombres");
        if(nombres.value == "" || /^\s+$/.test(nombres.value) || nombres.value.length > 30){
            nombres.style.backgroundColor = color_error;
            ok = false;
        }else{
            nombres.style.backgroundColor = color_ok;
        }

        var edad = document.getElementById("edad");
        if(edad.value == "" || /^\s+$/.test(edad.value) || edad.value.length > 30){
            edad.style.backgroundColor = color_error;
            ok = false;
        }else{
            edad.style.backgroundColor = color_ok;
        }

        var fecha_nacimiento = document.getElementById("fecha_nacimiento");
        if(fecha_nacimiento.value == "" || /^\s+$/.test(fecha_nacimiento.value) || fecha_nacimiento.value.length > 30){
            fecha_nacimiento.style.backgroundColor = color_error;
            ok = false;
        }else{
            fecha_nacimiento.style.backgroundColor = color_ok;
        }

        var telefono = document.getElementById("telefono");
        if(telefono.value == "" || /^\s+$/.test(telefono.value) || telefono.value.length > 10){
            telefono.style.backgroundColor = color_error;
            ok = false;
        }else{
            telefono.style.backgroundColor = color_ok;
        }

        var correo = document.getElementById("email");
        var valic =/^[\w]+@{1}[\w]+\.+[a-z]{2,3}$/;
        if (correo.value=="" || /^\s+$/.test(correo.value) || !valic.test(correo.value)) {
            correo.style.backgroundColor = color_error;
            ok = false;
        }else{
            correo.style.backgroundColor = color_ok;
        }

        var direccion = document.getElementById("direccion");
        if(direccion.value == "" || /^\s+$/.test(direccion.value) || direccion.value.length > 30){
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

        var username = document.getElementById("username");
        if(username.value == "" || /^\s+$/.test(username.value) || username.value.length > 30){
            username.style.backgroundColor = color_error;
            ok = false;
        }else{
            username.style.backgroundColor = color_ok;
        }

        var password = document.getElementById("password");
        if(password.value == "" || /^\s+$/.test(password.value) || password.value.length > 30){
            password.style.backgroundColor = color_error;
            ok = false;
        }else{
            password.style.backgroundColor = color_ok;
        }

        var reppassword = document.getElementById("reppassword");
        if(password.value == "" || /^\s+$/.test(reppassword.value) || reppassword.value.length > 30){
            reppassword.style.backgroundColor = color_error;
            ok = false;
        }else{
            reppassword.style.backgroundColor = color_ok;
        }

        if(password.value != reppassword.value){
            reppassword.style.backgroundColor = color_error;
            password.style.backgroundColor = color_error;
            alert("Los password no coinciden");
            ok = false;
        }else{
            reppassword.style.backgroundColor = color_ok;
            password.style.backgroundColor = color_ok;
        }

        var id_pais = document.getElementById("id_pais");
        if(id_pais.value == "" || /^\s+$/.test(id_pais.value) || id_pais.value.length > 30){
            id_pais.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_pais.style.backgroundColor = color_ok;
        }

        var id_entidad = document.getElementById("id_entidad");
        if(id_entidad.value == "" || /^\s+$/.test(id_entidad.value) || id_entidad.value.length > 30){
            id_entidad.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_entidad.style.backgroundColor = color_ok;
        }

        var id_municipio = document.getElementById("id_municipio");
        if(id_municipio.value == "" || /^\s+$/.test(id_municipio.value) || id_municipio.value.length > 30){
            id_municipio.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_municipio.style.backgroundColor = color_ok;
        }

        var id_tipo_usuario = document.getElementById("id_tipo_usuario");
        if(id_tipo_usuario.value == "" || /^\s+$/.test(id_tipo_usuario.value) || id_tipo_usuario.value.length > 30){
            id_tipo_usuario.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_tipo_usuario.style.backgroundColor = color_ok;
        }

        var status = document.getElementById("status");
        if(status.value == "" || /^\s+$/.test(status.value) || status.value.length > 30){
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
</script>
<h1 align="center">Crear un nuevo usuario.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['url'=>'/users', 'onsubmit'=>'return validar();']) !!}
    <div class="form-group">
        {!! Form::label ('ap_paterno', 'Apellido paterno del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::text ('ap_paterno',null,['placeholder'=>'Ingresa el nombre', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('ap_materno', 'Apellido materno del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::text ('ap_materno',null,['placeholder'=>'Ingresa el nombre', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('nombres', 'Nombre(s) del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::text ('nombres',null,['placeholder'=>'Ingresa el nombre(s)', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('edad', 'Edad del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::number ('edad',null,['placeholder'=>'Ingresa la edad', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('telefono', 'Telefono del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::number ('telefono',null,['placeholder'=>'Ingresa el telefono', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('fecha_nacimiento', 'Fecha de nacimiento del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::date ('fecha_nacimiento',null,['placeholder'=>'Ingresa la fecha de nacimiento', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('email', 'Correo del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::email ('email',null,['placeholder'=>'Ingresa el correo', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('direccion', 'Direccion del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::text ('direccion',null,['placeholder'=>'Ingresa la direccion', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('cp', 'Codigo postal del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::number ('cp',null,['placeholder'=>'Ingresa el codigo postal', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('username', 'Username del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::text ('username',null,['placeholder'=>'Ingresa el Username', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('password', 'Password del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::password ('password',null,['placeholder'=>'Ingresa el password', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('reppassword', 'Repita el password',['class'=>'text-muted miest']) !!}
        {!! Form::password ('reppassword',null,['placeholder'=>'Repita el password', 'class'=>'form-control']) !!}
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
        {!! Form::label ('id_tipo_usuario', 'Nombre de tipo de usuario',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_tipo_usuario',$tiposusers->pluck('nombre','id')->all(), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        {!! Form::label ('status', 'Estatus del usuario',['class'=>'text-muted miest']) !!}
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo','2'=>'pendiente'), null, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit ('Guardar usuario',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()