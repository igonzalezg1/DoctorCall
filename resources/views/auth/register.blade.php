@extends('template.master')
@section('contenido_central')
<div class="container">
    <h1> Crear un usuario</h1>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="register" method="post" role="form">
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
                    <input type="text" name="cp" class="form-control" id="cp"
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
                <div class="form=group">
                    <select name="id_tipo_usuario" id="id_tipo_usuario">
                        <option value="1">Doctor</option>
                        <option value="2">Cliente</option>
                        <option value="3">Administrador</option>
                    </select>
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