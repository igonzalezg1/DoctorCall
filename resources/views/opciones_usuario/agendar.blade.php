@extends('template.master')
@section('contenido_central')
<script>
    function validar(){
        var ok = true;
        var color_error = "#FFCCCC";
        var color_ok = "#D8FFCC";

        var tipo_cita = document.getElementById("tipo_cita");
        if(tipo_cita.value == "" || /^\s+$/.test(tipo_cita.value) || tipo_cita.value.length > 30){
            tipo_cita.style.backgroundColor = color_error;
            ok = false;
        }else{
            tipo_cita.style.backgroundColor = color_ok;
        }

        var id_forma_pago = document.getElementById("id_forma_pago");
        if(id_forma_pago.value == "" || /^\s+$/.test(id_forma_pago.value) || id_forma_pago.value.length > 30){
            id_forma_pago.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_forma_pago.style.backgroundColor = color_ok;
        }

        var fecha = document.getElementById("fecha");
        if(fecha.value == "" || /^\s+$/.test(fecha.value) || fecha.value.length > 30){
            fecha.style.backgroundColor = color_error;
            ok = false;
        }else{
            fecha.style.backgroundColor = color_ok;
        }

        var hora = document.getElementById("hora");
        if(hora.value == "" || /^\s+$/.test(hora.value) || hora.value.length > 30){
            hora.style.backgroundColor = color_error;
            ok = false;
        }else{
            hora.style.backgroundColor = color_ok;
        }

        var no_tarjeta = document.getElementById("no_tarjeta");
        if(no_tarjeta.value == "" || /^\s+$/.test(no_tarjeta.value) || no_tarjeta.value.length > 16 || no_tarjeta.value.length < 16){
            no_tarjeta.style.backgroundColor = color_error;
            ok = false;
        }else{
            no_tarjeta.style.backgroundColor = color_ok;
        }

        var cvv = document.getElementById("cvv");
        if(cvv.value == "" || /^\s+$/.test(cvv.value) || cvv.value.length > 3 || cvv.value.length < 3){
            cvv.style.backgroundColor = color_error;
            ok = false;
        }else{
            cvv.style.backgroundColor = color_ok;
        }

        var vencimiento = document.getElementById("vencimiento");
        if(vencimiento.value == "" || !(/^([0-9,/])*$/.test(vencimiento.value)) || vencimiento.value.length > 5 || vencimiento.value.length < 5){
            vencimiento.style.backgroundColor = color_error;
            ok = false;
        }else{
            vencimiento.style.backgroundColor = color_ok;
        }

        if(ok == false){
            alert("Compruebe los campos en rojo");
        }

        return ok;
    }
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" align="center">
            <h2>Agendar cita ahora.</h2>
            <br />
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4 align="justify">
                Hola {!! $usuarioactual->ap_paterno !!}  {!! $usuarioactual->ap_materno !!} {!! $usuarioactual->nombres !!} !!!!.
                <br />
                <br />
                Estas a un paso de agendar tu cita, te presentamos la informacion del doctor que te atendera, favor de llenar los campos
                y dar en agendar cita para poder tener una cita agendada.
            </h4>
            <br />
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <img src="{!! asset('estilo/img/iconos/doctor.png') !!}" alt="" width="300px">
            <h4>
                Nombre completo:
                {!! $doctor->users->ap_paterno !!} {!! $doctor->users->ap_materno !!} {!! $doctor->users->nombres !!}
            </h4>
            <h4>
                Telefono: {!! $doctor->users->telefono !!}
            </h4>
            <h4>
                Correo de contacto: {!! $doctor->users->email !!} 
            </h4>
            <h4>
                Calificacion: {!! $doctor->calificacion !!} 
            </h4>
            <h4>
                Descripcion: {!! $doctor->descripcion !!}
            </h4>
            <h4>
                Direccion de consultorio: {!! $doctor->consultorios->direccion !!}
            </h4>
            <br />
            <br />
            <br />
            <br />
            <br />
            <img src="{!! asset('estilo/img/iconos/tarjetas.png') !!}" alt="" width="750px">
        </div>
        <div class="col-sm-6">
            {!! Form::open(['url'=>'/opcionesusuario' , 'onsubmit'=>'return validar();']) !!}
            {{ csrf_field() }}
                <div class="form=group">
                    <label for="total" class="text-muted miest">Total a pagar:</label>
                    <select name="total" id="total" class="form-control">
                        <option value="{!! $doctor->precio_consulta !!}">${!! $doctor->precio_consulta !!}</option>
                    </select>
                </div>
                <div class="form=group">
                    <label for="tipo_cita" class="text-muted miest">Ingrese el tipo de cita.</label>
                    <select name="tipo_cita" id="tipo_cita" class="form-control">
                        <option value="">Seleccione una opcion</option>
                        <option value="presencial">Cita presencial en consultorio</option>
                        <option value="linea">Cita en linea por videollamada</option>
                        <option value="domicilio">Cita a domicilio</option>
                    </select>
                </div>
                <div class="form=group">
                    <label for="id_forma_pago" class="text-muted miest">Seleccione la forma de pago.</label>
                    <select name="id_forma_pago" id="id_forma_pago" class="form-control">
                    <option value="">Seleccione una opcion</option>
                        @foreach($formas_pagos as $fp)
                            <option value="{!! $fp->id !!}">{!! $fp->nombre !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form=group">
                    <label for="id_cliente" class="text-muted miest">Cliente:</label>
                    <select name="id_cliente" id="id_cliente" class="form-control">
                        <option value="{!! $usuarioactual->id !!}">{!! $usuarioactual->ap_paterno !!}  {!! $usuarioactual->ap_materno !!} {!! $usuarioactual->nombres !!}</option>
                    </select>
                </div>
                <div class="form=group">
                    <label for="id_doctor" class="text-muted miest">Doctor:</label>
                    <select name="id_doctor" id="id_doctor" class="form-control">
                        <option value="{!! $doctor->users->id !!}">{!! $doctor->users->ap_paterno !!} {!! $doctor->users->ap_materno !!} {!! $doctor->users->nombres !!}</option>
                    </select>
                </div>
                <hr />
                <div class="form=group">
                    <label for="fecha">Selecciona la fecha de la cita</label>
                    <input type="date" class="form-control" id="fecha" placeholder="Ingresa la fecha" name="fecha">
                </div>
                <div class="form=group">
                    <label for="hora">Selecciona la hora de la cita</label>
                    <input type="time" class="form-control" id="hora" placeholder="Ingresa la hora" name="hora">
                </div>
                <div class="form=group">
                    <label for="no_tarjeta">Ingresa el numero de la tarjeta</label>
                    <input type="number" class="form-control" id="no_tarjeta" placeholder="EJ. 1234567890" name="no_tarjeta">
                </div>
                <div class="form=group">
                    <label for="cvv">Ingresa el CVV (Parte trasera de tarjeta)</label>
                    <input type="number" class="form-control" id="cvv" placeholder="EJ. 027" name="cvv">
                </div>
                <br />
                <div class="form=group">
                    <label for="vencimiento">Ingresa el Vencimiento (Parte frontal de tarjeta)</label>
                    <input type="text" class="form-control" id="vencimiento" placeholder="EJ. 05/23" name="vencimiento">
                </div>
                <br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Agendar cita</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection()