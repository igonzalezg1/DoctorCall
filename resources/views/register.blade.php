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

        var password2 = document.getElementById("password2");
        if(password.value == "" || /^\s+$/.test(password2.value) || password2.value.length > 30){
            password2.style.backgroundColor = color_error;
            ok = false;
        }else{
            password2.style.backgroundColor = color_ok;
        }

        if(password.value != password2.value){
            password2.style.backgroundColor = color_error;
            password.style.backgroundColor = color_error;
            alert("Los password no coinciden");
            ok = false;
        }else{
            password2.style.backgroundColor = color_ok;
            password.style.backgroundColor = color_ok;
        }

        var id_tipo_usuario = document.getElementById("id_tipo_usuario");
        if(id_tipo_usuario.value == "" || /^\s+$/.test(id_tipo_usuario.value) || id_tipo_usuario.value.length > 30){
            id_tipo_usuario.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_tipo_usuario.style.backgroundColor = color_ok;
        }

        if(ok == false){
            alert("Compruebe los campos en rojo");
        }
        return ok;
    }
</script>
<div class="container">
    <h1> Crear un usuario</h1>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="register" method="post" role="form" onsubmit="return validar();">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="ap_paterno" class="form-control" id="ap_paterno"
                    placeholder="Ingrese el apellido paterno">
                </div>

                <div class="form-group">
                    <input type="text" name="ap_materno" class="form-control" id="ap_materno"
                    placeholder="Ingrese el apellido materno">
                </div>

                <div class="form-group">
                    <input type="text" name="nombres" class="form-control" id="nombres"
                    placeholder="Ingrese el nombre(s)">
                </div>

                <div class="form-group">
                    <input type="number" name="edad" class="form-control" id="edad"
                    placeholder="Ingrese la edad">
                </div>

                <div class="form-group">
                    <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento"
                    placeholder="Ingrese la fecha de nacimiento">
                </div>

                <div class="form-group">
                    <input type="number" name="telefono" class="form-control" id="telefono"
                    placeholder="Ingrese el telefono">
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="email"
                    placeholder="Ingrese el correo">
                </div>

                <div class="form-group">
                    <input type="text" name="direccion" class="form-control" id="direccion"
                    placeholder="Ingrese la direccion">
                </div>

                <div class="form-group">
                    <input type="number" name="cp" class="form-control" id="cp"
                    placeholder="Ingrese el codigo postal">
                </div>

                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="username"
                    placeholder="Ingrese el nombre de usuario">
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="password"
                    placeholder="Ingrese el password" data-msg="capturar el password">
                </div>

                <div class="form-group">
                    <input type="password" name="password2" class="form-control" id="password2"
                    placeholder="Repita el password" data-msg="capturar el password">
                </div>

                <div class="form=group">
                    <select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control">
                        <option value="1">Doctor</option>
                        <option value="2">Cliente</option>
                    </select>
                    <br />
                    <br />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-block">Crear usuario</button>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
@endsection()