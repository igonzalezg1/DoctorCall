@extends('template.master')
@section('contenido_central')
<script>
        function validar(){
        var ok = true;
        var color_error = "#FFCCCC";
        var color_ok = "#D8FFCC";

        var fecha = document.getElementById("fecha");
        if(fecha.value == "" || /^\s+$/.test(fecha.value) || fecha.value.length > 30){
            fecha.style.backgroundColor = color_error;
            ok = false;
        }else{
            fecha.style.backgroundColor = color_ok;
        }

        var hora = document.getElementById("hora");
        if(hora.value == "" || /^\s+$/.test(hora.value) || hora.value.length > 50){
            hora.style.backgroundColor = color_error;
            ok = false;
        }else{
            hora.style.backgroundColor = color_ok;
        }

        var subtotal = document.getElementById("subtotal");
        if(subtotal.value == "" || /^\s+$/.test(subtotal.value) || subtotal.value.length > 10){
            subtotal.style.backgroundColor = color_error;
            ok = false;
        }else{
            subtotal.style.backgroundColor = color_ok;
        }

        var iva = document.getElementById("iva");
        if(iva.value == "" || /^\s+$/.test(iva.value) || iva.value.length > 10){
            iva.style.backgroundColor = color_error;
            ok = false;
        }else{
            iva.style.backgroundColor = color_ok;
        }

        var total = document.getElementById("total");
        if(total.value == "" || /^\s+$/.test(total.value) || total.value.length > 10){
            total.style.backgroundColor = color_error;
            ok = false;
        }else{
            total.style.backgroundColor = color_ok;
        }

        var no_tarjeta = document.getElementById("no_tarjeta");
        if(no_tarjeta.value == "" || /^\s+$/.test(no_tarjeta.value) || no_tarjeta.value.length > 16){
            no_tarjeta.style.backgroundColor = color_error;
            ok = false;
        }else{
            no_tarjeta.style.backgroundColor = color_ok;
        }

        var cvv = document.getElementById("cvv");
        if(cvv.value == "" || /^\s+$/.test(cvv.value) || cvv.value.length > 3){
            cvv.style.backgroundColor = color_error;
            ok = false;
        }else{
            cvv.style.backgroundColor = color_ok;
        }

        var id_cita = document.getElementById("id_cita");
        if(id_cita.value == "" || /^\s+$/.test(id_cita.value) || id_cita.value.length > 10){
            id_cita.style.backgroundColor = color_error;
            ok = false;
        }else{
            id_cita.style.backgroundColor = color_ok;
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
<h1 align="center">Editar detalles de cita {!! $detallecita->fecha !!}, {!! $detallecita->hora !!}.</h1>
<br />
<div class="container">
<div class="row">
    <div class="col-sm-12">
    {!! Form::open(['method'=>'PATCH', 'url'=>'/detalles_citas/'.$detallecita->id, 'onsubmit'=>'return validar();']) !!}
    <div class="form-group">
        {!! Form::label ('fecha', 'Fecha de cita',['class'=>'text-muted miest']) !!}
        {!! Form::date ('fecha',$detallecita->fecha,['placeholder'=>'Ingresa la fecha','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('hora', 'Hora de cita',['class'=>'text-muted miest']) !!}
        {!! Form::time ('hora',$detallecita->hora,['placeholder'=>'Ingresa la hora','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('subtotal', 'Subtotal',['class'=>'text-muted miest']) !!}
        {!! Form::number ('subtotal',$detallecita->subtotal,['placeholder'=>'Ingresa el subtotal', 'class'=>'form-control', 'step'=>'any']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('iva', 'IVA',['class'=>'text-muted miest']) !!}
        {!! Form::number ('iva',$detallecita->iva,['placeholder'=>'Ingresa el IVA', 'class'=>'form-control', 'step'=>'any']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('total', 'Total',['class'=>'text-muted miest']) !!}
        {!! Form::number ('total',$detallecita->total,['placeholder'=>'Ingresa el total', 'class'=>'form-control', 'step'=>'any']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('no_tarjeta', 'Numero de tarjeta',['class'=>'text-muted miest']) !!}
        {!! Form::number ('no_tarjeta',$detallecita->no_tarjeta,['placeholder'=>'Ingresa el numero de tarjeta', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('cvv', 'Numero CVV',['class'=>'text-muted miest']) !!}
        {!! Form::number ('cvv',$detallecita->cvv,['placeholder'=>'Ingresa el numero CVV', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('id_cita', 'Numero de cita',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('id_cita',$citas->pluck('id','id')->all(), $detallecita->id_cita, ['placeholder'=>'Seleccionar', 'class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::label ('status', 'Estatus de detalle de cita',['class'=>'text-muted miest']) !!}
        <br />
        {!! Form::select ('status', array('1'=>'Activo', '0'=>'Inactivo'), $detallecita->status, ['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
        <br />
    </div>
    <div class="form-group">
        <br />
        {!! Form::submit ('Guardar detalle de cita',['class'=>'btn btn-outline-success btn-block']) !!}
    </div>
{!! Form::close() !!}
    </div>
</div>
</div>
@endsection()