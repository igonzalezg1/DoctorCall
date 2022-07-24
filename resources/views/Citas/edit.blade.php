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

        var id_doctor = document.getElementById("id_doctor");
        if(id_doctor.value == "" || /^\s+$/.test(id_doctor.value) || id_doctor.value.length > 50){
            id_doctor.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_doctor.style.backgroundColor = color_ok;
        }

        var id_cliente = document.getElementById("id_cliente");
        if(id_cliente.value == "" || /^\s+$/.test(id_cliente.value) || id_cliente.value.length > 5){
            id_cliente.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_cliente.style.backgroundColor = color_ok;
        }

        var id_forma_pago = document.getElementById("id_forma_pago");
        if(id_forma_pago.value == "" || /^\s+$/.test(id_forma_pago.value) || id_forma_pago.value.length > 10){
            id_forma_pago.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_forma_pago.style.backgroundColor = color_ok;
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
<h1 align="center">Editar cita {!! $cita->id !!}.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['method'=>'PATCH', 'url'=>'/citas/'.$cita->id, 'onsubmit'=>'return validar();']) !!}
    <div class="form-group">
        <br />
        {!! Form::label ('tipo_cita', 'Tipo de cita',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('tipo_cita', array('presencial'=>'Presencial en consultorio', 'en linea'=>'En linea (videollamada)', 'domicilio'=>'Cita a domicilio'), $cita->tipo_cita, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_doctor', 'Nombre de doctor',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_doctor',$doctores->pluck('nombres','id')->all(), $cita->id_doctor, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_cliente', 'Nombre de cliente',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_cliente',$clientes->pluck('nombres','id')->all(), $cita->id_cliente, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_forma_pago', 'Forma de pago',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_forma_pago',$formaspagos->pluck('nombre','id')->all(), $cita->id_forma_pago, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('status', 'Estatus de la cita',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo'), $cita->status, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::submit ('Guardar cita',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()